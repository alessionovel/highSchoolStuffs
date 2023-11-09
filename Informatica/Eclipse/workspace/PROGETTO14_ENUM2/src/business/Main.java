package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

import bean.Ordine;
import bean.Studente;
import bean.TipoPanino;

public class Main {

	Gestione ges = new Gestione();
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);

	public static void main(String[] args) {
		new Main();
	}
	Main(){
		TipoPanino[] menu = TipoPanino.values();


		System.out.println("Il nostro menù: ");
		for (int i=0; i<menu.length; i++){
			System.out.println(menu[i] + " con salsa " +menu[i].getSalsa() + " " + menu[i].getPrezzo() + " euro");
		}
		menu();


	}

	public void menu() {
		int scelta=0;
		boolean errore;
		do {
			do {
				System.out.println("1. Nuovo ordine\n2. Mostra ordini\n3. Cancella ordine\n4. Esci");
				errore=false;
				try {
					try {
						scelta = Integer.parseInt(input.readLine());
					}catch(IOException ex) {
						System.out.println("Errore di digitazione");
						errore=true;
					}
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
			}while(errore==true || (scelta<1 && scelta>4));
			if (scelta==1) {
				nuovoOrdine();
			}
			if (scelta==2) {
				stampaOrdine();
			}
			if (scelta==3) {
				delOrdine();
			}
		}while (scelta!=4);
	}

	public void nuovoOrdine(){
		String scuola="", data="", ora="";
		try {
			System.out.println("Inserisci nome scuola: ");
			scuola = input.readLine();
			System.out.println("Inserisci data: ");
			data = input.readLine();
			System.out.println("Inserisci ora consegna: ");
			ora = input.readLine();
		}catch (IOException ex) {
			System.out.println("Errore di digitazione");
		}
		System.out.println(ges.nuovoOrdine(new Ordine(scuola,data,ora)));
		int scelta=0;
		do {
			boolean errore;
			do {
				System.out.println("1. Aggiungi studente\n2. Elimina studente\n3. Esci");
				errore=false;
				try {
					try {
						scelta = Integer.parseInt(input.readLine());
					}catch (IOException ex) {
						System.out.println("Errore di digitazione");
						errore=true;
					}
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
			}while(errore==true || (scelta<1 && scelta>3));
			if (scelta==1) {
				addStudente();
			}
			if (scelta==2) {
				delStudente();
			}
		}while (scelta!=3);
	}

	public void addStudente() {
		String no="", co="", cl="";
		try {
			System.out.println("Inserisci nome studente: ");
			no = input.readLine();
			System.out.println("Inserisci cognome studente: ");
			co = input.readLine();
			System.out.println("Inserisci classe studente: ");
			cl = input.readLine();
		}catch (IOException ex) {
			System.out.println("Errore di digitazione");
		}
		String pan="";
		TipoPanino p=null;
		TipoPanino[] ele = TipoPanino.values();
		System.out.println("scegli panino:");
		for (int i=0; i<ele.length; i++){
			System.out.println(ele[i] + " con salsa " +ele[i].getSalsa() + " " + ele[i].getPrezzo() + " euro");
		}
		boolean errore;
		do {
			try {
				pan = input.readLine().toUpperCase();
			}catch (IOException ex) {
				System.out.println("Errore di digitazione");
			}
			errore=false;
			try {
				p = TipoPanino.valueOf(pan);
			}catch(IllegalArgumentException ex) {
				System.out.println("Panino non disponibile");
				errore=true;
			}
		}while(errore==true);
		System.out.println(ges.addStudente(new Studente(no, co, cl, p)));
	}

	public void delStudente() {
		String no, co, cl;
		try {
			System.out.println("Inserisci nome studente: ");
			no = input.readLine();
			System.out.println("Inserisci cognome studente: ");
			co = input.readLine();
			System.out.println("Inserisci classe studente: ");
			cl = input.readLine();
			System.out.println(ges.delStudente(no,co,cl));
		}catch (IOException ex) {
			System.out.println("Errore di digitazione");
		}
	}

	public void stampaOrdine() {
		System.out.println(ges.stampa());
	}

	public void delOrdine() {
		int ord=0;
		System.out.println("Inserisci il numero dell'ordine che vuoi cancellare: ");
		try {
			ord = Integer.parseInt(input.readLine());
		}catch (IOException ex) {
			System.out.println("Errore di digitazione");
		}
		ord--;
		System.out.println(ges.delOrdine(ord));
	}
}
