package business;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;


public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);
	BufferedReader leggiFile;
	BufferedWriter scriviFile;
	Gestione ges = new Gestione();

	public static void main(String[] args) throws IOException {
		new Main();
	}

	Main() throws IOException{
		controlloFile1();
		controlloFile2();
		System.out.println("Numero massimo partecipanti attuale: " + ges.getnMax());
		int scelta;
		do {
			scelta=menu();
			if(scelta==1) {
				aggPart();
			}
			if(scelta==2) {
				delPart();
			}
			if(scelta==3) {
				verPart();
			}
			if(scelta==4) {
				verAtt();
			}
			if(scelta==5) {
				modNMax();
			}
			if(scelta==6){
				mostraPart();
			}
			if(scelta==7) {
				mostraAtt();
			}
		}while(scelta!=8);
		fine();
	}

	public void controlloFile1() throws IOException {
		String s;
		int numMax;
		File mioFile=new File("partecipanti.txt");
		BufferedReader leggiFile;
		if (!mioFile.exists()){
			System.out.println("Il file non c'è: verifica la cartella ed il nome del file");
		} else {
			leggiFile = new BufferedReader(new FileReader(mioFile));
			int n=0;
			while(true) {
				if(n==0) {
					s=leggiFile.readLine();
					if(s==null) {
						break;
					}else {
						String lettura = s.substring(0,3);
						numMax = Integer.parseInt(lettura.trim());
						ges.setnMax(numMax);
					}
				}else {
					s=leggiFile.readLine();
					if(s==null) {
						break;
					}else {
						String nome = s.substring(0,19).trim();
						String cognome = s.substring(20,39).trim();
						String telefono = s.substring(40,55).trim();
						String indirizzo = s.substring(56,85).trim();
						String eta = s.substring(86,88).trim();
						aggiungiPart(nome,cognome,telefono,indirizzo,eta);
					}
				}
				n++;
			}
			leggiFile.close();
		}
	}

	public void controlloFile2() throws IOException {
		String s;
		File mioFile=new File("attesa.txt");
		BufferedReader leggiFile;
		if (!mioFile.exists()){
			System.out.println("Il file non c'è: verifica la cartella ed il nome del file");
		} else {
			leggiFile = new BufferedReader(new FileReader(mioFile));
			while(true) {
				s=leggiFile.readLine();
				if(s==null) {
					break;
				}else {
					String nome = s.substring(0,19).trim();
					String cognome = s.substring(20,39).trim();
					String telefono = s.substring(40,55).trim();
					String indirizzo = s.substring(56,85).trim();
					String eta = s.substring(86,88).trim();
					aggiungiPart(nome,cognome,telefono,indirizzo,eta);
				}
			}
		}

	}

	public void aggiungiPart(String nome, String cognome, String telefono, String indirizzo, String eta) {
		System.out.println(ges.aggC(nome, cognome, telefono, indirizzo, eta));
	}

	public int menu() throws IOException {
		int ret=0;
		boolean errore;
		do {
			System.out.println("\n\n1. Aggiungi prenotazione\n2. Disdici prenotazione\n3. Verifica partecipanti\n4. Verifica lista d'attesa\n5. Aumenta numero partecipanti\n6. Elenco partecipanti\n7. Lista attesa\n8. Esci\nInserisci la tua scelta");
			errore=false;
			try {
				ret = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (ret<1 || ret>8) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 8");
			}
		}while(errore==true);
		return ret;
	}

	public void aggPart() throws IOException {
		boolean errore;
		String nome;
		do {
			System.out.println("Inserisci nome partecipante: ");
			errore=false;
			nome = input.readLine().trim();
			if (nome.length()>20) {
				errore=true;
				System.out.println("Inserisci un nome più corto di 20 caratteri");
			}
		}while(errore==true);
		String cognome;
		do {
			System.out.println("Inserisci cognome partecipante: ");
			errore=false;
			cognome = input.readLine().trim();
			if (cognome.length()>20) {
				errore=true;
				System.out.println("Inserisci un cognome più corto di 20 caratteri");
			}
		}while(errore==true);
		String telefono;
		do {
			System.out.println("Inserisci telefono partecipante: ");
			errore=false;
			telefono = input.readLine().trim();
			if (telefono.length()>16) {
				errore=true;
				System.out.println("Inserisci un telefono più corto di 16 caratteri");
			}
		}while(errore==true);
		String indirizzo;
		do {
			System.out.println("Inserisci indirizzo partecipante: ");
			errore=false;
			indirizzo = input.readLine().trim();
			if (indirizzo.length()>30) {
				errore=true;
				System.out.println("Inserisci un indirizzo più corto di 30 caratteri");
			}
		}while(errore==true);
		String eta;
		do {
			System.out.println("Inserisci eta partecipante: ");
			errore=false;
			eta = input.readLine().trim();
			if (eta.length()>2) {
				errore=true;
				System.out.println("Inserisci un eta più corto di 2 caratteri");
			}
		}while(errore==true);
		aggiungiPart(nome,cognome,telefono,indirizzo,eta);
	}

	public void delPart() throws IOException {
		boolean errore;
		String nome;
		do {
			System.out.println("Inserisci nome partecipante: ");
			errore=false;
			nome = input.readLine().trim();
			if (nome.length()>20) {
				errore=true;
				System.out.println("Inserisci un nome più corto di 20 caratteri");
			}
		}while(errore==true);
		String cognome;
		do {
			System.out.println("Inserisci cognome partecipante: ");
			errore=false;
			cognome = input.readLine().trim();
			if (cognome.length()>20) {
				errore=true;
				System.out.println("Inserisci un cognome più corto di 20 caratteri");
			}
		}while(errore==true);
		String telefono;
		do {
			System.out.println("Inserisci telefono partecipante: ");
			errore=false;
			telefono = input.readLine().trim();
			if (telefono.length()>16) {
				errore=true;
				System.out.println("Inserisci un telefono più corto di 16 caratteri");
			}
		}while(errore==true);
		System.out.println(ges.delC(nome, cognome, telefono));
	}

	public void verPart() {
		System.out.println("Al momento ci sono " + ges.verPart() + " partecipanti");
	}

	public void verAtt() {
		System.out.println("Al momento ci sono " + ges.verAtt() + " clienti in lista d'attesa");
	}

	public void modNMax() throws IOException {
		boolean errore;
		int num=0;
		do {
			System.out.println("In che numero vuoi modificare il numero massimo di partecipanti?");
			errore=false;
			try {
				num = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (num<=ges.getnMax()) {
				errore=true;
				System.out.println("Inserire un numero maggiore di quello di prima (" + ges.getnMax() + ")");
			}
		}while(errore==true);
		ges.setnMax(num);
	}

	public void mostraPart(){
		System.out.println(ges.mostraPart());
	}

	public void mostraAtt(){
		System.out.println(ges.mostraAtt());
	}

	public void fine() throws IOException{
		File mioFile=new File("partecipanti.txt");
		scriviFile = new BufferedWriter(new FileWriter(mioFile));
		scriviFile.write(ges.getnMax2());
		for (int i=0;i<ges.getPartSize();i++) {
			scriviFile.write("\n"+ges.salvaPart(i));
		}
		scriviFile.close();
	}

}
