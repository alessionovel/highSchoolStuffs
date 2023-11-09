package business;

import java.security.InvalidKeyException;
import java.security.Key;
import java.security.KeyFactory;
import java.security.KeyPair;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
//import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.security.NoSuchAlgorithmException;
import java.security.PrivateKey;
import java.util.Scanner;

import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.NoSuchPaddingException;

import java.security.PublicKey;
import java.security.spec.InvalidKeySpecException;
import java.security.spec.PKCS8EncodedKeySpec;
import java.security.spec.X509EncodedKeySpec;
//import javax.crypto.PrivateKey;
import java.security.KeyPairGenerator;

public class Main {

	public static void main(String[] args) throws InvalidKeyException {
		@SuppressWarnings("resource")
		Scanner input = new Scanner(System.in);
		KeyPairGenerator generator = null;
		byte[] getKeyPub = null,getKeyPriv = null;
		byte[] cipherText = null;
		int opzione;

		try {
			generator = KeyPairGenerator.getInstance("RSA");
		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
		}

		generator.initialize(512);
		KeyPair pair = generator.generateKeyPair();
		Key pubKey = pair.getPublic();
		Key privKey = pair.getPrivate();
		

        ///////////////////////////////////////////////////////////////////////
        
		Cipher cifrario = null;
		try {
			cifrario = Cipher.getInstance("RSA/ECB/PKCS1Padding");
		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
		} catch (NoSuchPaddingException e) {
			e.printStackTrace();
		}

		do {
			do {
				System.out.println("\n\n1. Cifratura\n2. Decifratura\n3. Esci\nInserisci la tua scelta");
				opzione = Integer.parseInt(input.nextLine());
			} while (opzione != 1 && opzione != 2 && opzione != 3);

			switch (opzione) {
			case 1:
				//Salvataggio chiave Pubblica su file
				
				byte[] publicBytes = pubKey.getEncoded();
		        try {
		        	FileOutputStream fos = new FileOutputStream("keyPub.dat");
		        	ObjectOutputStream oos = new ObjectOutputStream(fos);
		        	oos.writeObject(publicBytes);
					fos.close();
					oos.close();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
				
				//Salvataggio chiave Privata su file
		        
		        byte[] privateBytes = privKey.getEncoded();
		        try {
		        	FileOutputStream fos = new FileOutputStream("keyPri.dat");
		        	ObjectOutputStream oos = new ObjectOutputStream(fos);
		        	oos.writeObject(privateBytes);
					fos.close();
					oos.close();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
				// cifratura
				cifrario.init(Cipher.ENCRYPT_MODE, pubKey); // cifrario inizializzato per cifratura

				System.out.print("Inserisci il testo: \n");
				String InPlainTxt = input.nextLine().toUpperCase();

				
				try {
					cipherText = cifrario.doFinal(InPlainTxt.getBytes());
				} catch (IllegalBlockSizeException e) {
					e.printStackTrace();
				} catch (BadPaddingException e) {
					e.printStackTrace();
				}
				String ReadableCipherText = new String(cipherText);
				
				//Salvataggio testo su file
				
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
				if(outputFile.canExecute()) {
					System.out.println("\nMessaggio cifrato");

				}
				
				break;
			case 2:
				// DECIFRATURA
				/////////////////////////////////////////////////////////////////////////////////////
				
				File koutputFile = new File("keyPub.dat");
				FileInputStream koutputStream;
				ObjectInputStream out;
				try {
					koutputStream = new FileInputStream(koutputFile);
					out = new ObjectInputStream(koutputStream);
					getKeyPub = (byte[]) out.readObject();
					out.close();
				} catch (IOException | ClassNotFoundException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				
				// Inizializza convertitore da X.509 a chiave pubblica
                X509EncodedKeySpec ks = new X509EncodedKeySpec(getKeyPub);
                // Inizializza un KeyFactory per ricreare la chiave usando RSA
                KeyFactory kf = null;
                PublicKey publicKey = null;
				try {
					kf = KeyFactory.getInstance("RSA");
					publicKey = kf.generatePublic(ks);
				} catch (NoSuchAlgorithmException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}catch (InvalidKeySpecException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
                
				// CONVERSIONE CHIAVE PRIVATA PKCS8 IN CHIAVE NORMALE
                koutputFile = new File("keyPri.dat");
				try {
					koutputStream = new FileInputStream(koutputFile);
					out = new ObjectInputStream(koutputStream);
					getKeyPriv = (byte[]) out.readObject();
					out.close();
				} catch (FileNotFoundException e1) {
					e1.printStackTrace();
				} catch (IOException e) {
					e.printStackTrace();
				} catch (ClassNotFoundException e) {
					e.printStackTrace();
				}
                
                PKCS8EncodedKeySpec ks2 = new PKCS8EncodedKeySpec(getKeyPriv);
                KeyFactory kf2 = null;
                PrivateKey privateKey = null;
				try {
					kf2 = KeyFactory.getInstance("RSA");
					privateKey = kf2.generatePrivate(ks2);
				} catch (NoSuchAlgorithmException e1) {
					e1.printStackTrace();
				} catch (InvalidKeySpecException e1) {
					e1.printStackTrace();
				}
                
				
				//Testo Cifrato
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
				
				
				cifrario.init(Cipher.DECRYPT_MODE, privateKey); // cifrario inizializzato per decifratura

				byte[] outPlainTxt = null;
				try {
					outPlainTxt = cifrario.doFinal(cipherText);
				} catch (IllegalBlockSizeException e) {
					e.printStackTrace();
				} catch (BadPaddingException e) {
					e.printStackTrace();
				}
				String ReadableOutPlainTxt = new String(outPlainTxt);
				System.out.print("Il testo sul file era: " + ReadableOutPlainTxt+ "\n");

				break;
			}

		} while (opzione == 1 || opzione == 2);

	}
}
