package business;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.security.InvalidKeyException;
import java.security.NoSuchAlgorithmException;

import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.KeyGenerator;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.SecretKey;

public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);

	public static void main(String[] args) throws InvalidKeyException, IOException {
		new Main();
	}

	Main() throws IOException, InvalidKeyException{
		int scelta = 0;
		do {
			scelta = menu();
			if (scelta == 1) {
				cifratura();
			}
			if (scelta == 2) {
				decifratura();
			}
		} while (scelta != 3);
	}

	int menu() throws IOException {
		int ret = 0;
		boolean errore;
		do {
			System.out.println(
					"\n\n1. Cifratura\n2. Decifratura\n3. Esci\nInserisci la tua scelta");
			errore = false;
			try {
				ret = Integer.parseInt(input.readLine());
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero\n");
				errore = true;
			}
			if (ret < 1 || ret > 3) {
				errore = true;
				System.out.println("Inserire un numero tra 1 e 3\n");
			}
		} while (errore == true);
		return ret;
	}

	void cifratura() throws IOException, InvalidKeyException{
		SecretKey key = null;
		Cipher cipher = null;
		byte[] cipherText = null;
		KeyGenerator keyGenerator = null;
		try {
			keyGenerator = KeyGenerator.getInstance("DES");
		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
		}
		keyGenerator.init(56);
		key = keyGenerator.generateKey();

		cipher = null;
		try {
			cipher = Cipher.getInstance("DES/ECB/PKCS5Padding");
		} catch (NoSuchAlgorithmException | NoSuchPaddingException e) {
			e.printStackTrace();
		}


		System.out.print("Inserisci il testo: \n");
		String stringToEncrypt = input.readLine().toUpperCase();

		cipher.init(Cipher.ENCRYPT_MODE, key);
		cipherText = null;
		try {
			cipherText = cipher.doFinal(stringToEncrypt.getBytes());
		} catch (IllegalBlockSizeException | BadPaddingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} 
		String testo = new String(cipherText);
		System.out.println("Testo cifrato: " + testo);

		File outputFile = new File("dati.dat");
		FileOutputStream outputStream;
		try {
			outputStream = new FileOutputStream(outputFile);
			outputStream.write(cipherText);
			outputStream.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		try {
			File koutputFile = new File("key.dat");
			FileOutputStream koutputStream = new FileOutputStream(koutputFile);
			ObjectOutputStream oout = new ObjectOutputStream(koutputStream);
			oout.writeObject(key);
			oout.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	void decifratura() throws InvalidKeyException {
		SecretKey key = null;
		Cipher cipher = null;
		byte[] cipherText = null;
	  	File koutputFile = new File("key.dat");
		FileInputStream koutputStream;
		try {
			koutputStream = new FileInputStream(koutputFile);
			ObjectInputStream oout = new ObjectInputStream(koutputStream);
			key = (SecretKey) oout.readObject();
			oout.close();
		} catch (FileNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	  	File inputFile = new File("dati.dat");
		FileInputStream inputStream;
		try {
			inputStream = new FileInputStream(inputFile);
			cipherText = new byte[(int) inputFile.length()];
			inputStream.read(cipherText);
			inputStream.close();
		} catch (FileNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	  	cipher = null;
		try {
			cipher = Cipher.getInstance("DES/ECB/PKCS5Padding");
		} catch (NoSuchAlgorithmException | NoSuchPaddingException e) {
			e.printStackTrace();
		}
		
		
		cipher.init(Cipher.DECRYPT_MODE, key); 
		byte[] plainText = null;
		try {
			plainText = cipher.doFinal(cipherText);
		} catch (IllegalBlockSizeException | BadPaddingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		System.out.println("\n");
		
	
		String decifrato = new String(plainText);
		String cifrato = new String(cipherText);
		System.out.println("Il testo cifrato " + cifrato + " e' stato decifrato in " + decifrato);
	}

}