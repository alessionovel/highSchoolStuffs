package business;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);

	public static void main(String[] args) throws IOException {
		new Main();
	}

	Main() throws IOException{
		int scelta=0;
		do {
			scelta=menu();
			if(scelta==1) {
				cifDec();
			}
			if(scelta==2) {
				bruteForce();
			}
			if(scelta==3) {
				bruteForceDizionario();
			}
		}while(scelta!=4);
	}

	int menu() throws IOException {
		int ret=0;
		boolean errore;
		do {
			System.out.println("1. Cifratura/decifratura\n2. Brute Force\n3. Brute Force con dizionario\n4. Esci\nInserisci la tua scelta");
			errore=false;
			try {
				ret = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero\n");
				errore=true;
			}
			if (ret<1 || ret>4) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 4\n");
			}
		}while(errore==true);
		return ret;
	}

	void cifDec() throws NumberFormatException, IOException {
		int j,k;
		String p="";
		do {
			System.out.println("Inserire la chiave di cifratura (intero tra 0 a 26):");
			k = Integer.parseInt(input.readLine());
		}while(k<0 || k>26);
		System.out.println("Inserisci parola:");
		p=input.readLine();
		p=p.toUpperCase();
		for(int i=0;i < p.length();i++)
			if(p.charAt(i)<'A' || p.charAt(i)>'Z')
				p=p.replaceAll(""+p.charAt(i),"" );
		System.out.println(p);
		do {
			System.out.print("Codifica(1) o Decodifica(2)?:");
			j= Integer.parseInt(input.readLine());
		}while (j<1 || j>2);
		if(j==1) {
			System.out.println(codifica(p,k));
		}else if(j==2) {
			System.out.println(decodifica(p,k));
		}
	}

	static String codifica(String p,int k){
		int j;
		String c="";
		for(int i=0;i < p.length();i++){
			j=(int)p.charAt(i)+k;
			if(j > 90)j-=26;
			c+=(char)j;
		}
		return c;
	}

	static String decodifica(String p,int k){
		int j;
		String c="";
		for(int i=0;i < p.length();i++){
			j=(int)p.charAt(i)-k;
			if(j < 65)j+=25;
			c+=(char)j;
		}
		return c;
	}

	void bruteForce() throws IOException {
		String p="";
		System.out.println("Inserisci parola:");
		p=input.readLine();
		p=p.toUpperCase();
		for(int i=0;i < p.length();i++)
			if(p.charAt(i)<'A' || p.charAt(i)>'Z')
				p=p.replaceAll(""+p.charAt(i),"" );
		for (int k=0;k<25;k++) {
			int j;
			String c="";
			for(int i=0;i < p.length();i++){
				j=(int)p.charAt(i)-k;
				if(j < 65)j+=25;
				c+=(char)j;
			}
			System.out.println(c);
		}
	}

	void bruteForceDizionario() throws IOException {
		String stringa="";
		System.out.println("Inserisci testo:");
		stringa=input.readLine();
		char cifra[] = stringa.toCharArray();
		BufferedReader dizionario = null;
		int cont = 0;
		String cript = "";
		int temp = 0;
		String finale = "";

		for (int i = 0; i < 27; i++) {
			dizionario = new BufferedReader(new FileReader("dizionario.txt"));
			for (int j = 0; j < stringa.length(); j++) {
				int k = (int) cifra[j];
				k -= i;
				if (k < 65)
					k += 26;
				cript += (char) k;
			}

			String line = dizionario.readLine();
			while (line != null) {
				if (cript.contains(line)) {
					cont++;
				}

				line = dizionario.readLine();
				if (line != null) {
					line = line.toUpperCase();
				}
			}

			if (cont > temp) {
				temp = cont;
				finale = cript;
			}
			System.out.println("Sono state trovate" + cont + " parole\n");
			cont = 0;
			cript = "";
		}
		System.out.println("Il tuo testo potrebbe essere: " +finale);
	}
}
