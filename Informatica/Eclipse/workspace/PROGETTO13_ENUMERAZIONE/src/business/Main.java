package business;

import java.util.Scanner;

import bean.Ordine;
import bean.Studente;
import bean.TipoPanino;

public class Main {

	Gestione ges = new Gestione();
	Scanner input = new Scanner(System.in);

	public static void main(String[] args) {
		new Main();
	}
	Main(){
		TipoPanino[] menu = TipoPanino.values();


		System.out.println("Il nostro menù: ");
		for (int i=0; i< menu.length; i++){
			System.out.println(menu[i].toString());
		}
		menu();


	}

	public void menu() {
		int scelta=0;
		do {
			System.out.println("1. Nuovo ordine\n2. Mostra ordini\n3. Cancella ordine\n4. Esci");
			scelta = Integer.parseInt(input.nextLine());
			if (scelta<1 && scelta>4){
				do {
					System.out.println("Numero inserito non valido, riprova...");
					scelta = Integer.parseInt(input.nextLine());
				}while (scelta<1 && scelta>4);
			}
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
		String scuola, data, ora;
		System.out.println("Inserisci nome scuola: ");
		scuola = input.nextLine();
		System.out.println("Inserisci data: ");
		data = input.nextLine();
		System.out.println("Inserisci ora consegna: ");
		ora = input.nextLine();
		System.out.println(ges.nuovoOrdine(new Ordine(scuola,data,ora)));
		int scelta=0;
		do {
			System.out.println("1. Aggiungi studente\n2. Elimina studente\n3. Esci");
			scelta = Integer.parseInt(input.nextLine());
			if (scelta<1 && scelta>3) {
				do {
					System.out.println("Numero inserito non valido, riprova...");
					scelta = Integer.parseInt(input.nextLine());
				}while (scelta<1 && scelta>3);
			}
			if (scelta==1) {
				addStudente();
			}
			if (scelta==2) {
				delStudente();
			}
		}while (scelta!=3);
	}

	public void addStudente() {
		String no, co, cl;
		System.out.println("Inserisci nome studente: ");
		no = input.nextLine();
		System.out.println("Inserisci cognome studente: ");
		co = input.nextLine();
		System.out.println("Inserisci classe studente: ");
		cl = input.nextLine();
		String pan;
		TipoPanino p;
		TipoPanino[] ele = TipoPanino.values();
		System.out.println("scegli panino:");
		for (int i=0; i<ele.length; i++){
			System.out.println(ele[i]); }
		pan = input.nextLine();
		p = TipoPanino.valueOf(pan);
		System.out.println(ges.addStudente(new Studente(no, co, cl, p)));
	}

	public void delStudente() {
		String no, co, cl;
		System.out.println("Inserisci nome studente: ");
		no = input.nextLine();
		System.out.println("Inserisci cognome studente: ");
		co = input.nextLine();
		System.out.println("Inserisci classe studente: ");
		cl = input.nextLine();
		System.out.println(ges.delStudente(no,co,cl));
	}

	public void stampaOrdine() {
		System.out.println(ges.stampa());
	}

	public void delOrdine() {
		int ord=0;
		System.out.println("Inserisci il numero dell'ordine che vuoi cancellare: ");
		ord = Integer.parseInt(input.nextLine());
		ord--;
		System.out.println(ges.delOrdine(ord));
	}
}
