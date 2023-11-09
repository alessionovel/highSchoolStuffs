package business;

import java.util.Scanner;

import bean.Negozio;
import bean.Pianta;

public class Main {

	Scanner input;
	Negozio negozio;

	public static void main(String[] args) {
		new Main();
	}

	Main(){
		int scelta;
		input = new Scanner(System.in);
		inizio();
		do {
			scelta=menu();
			switch (scelta) {
			case 1:
				addPianta();
				break;
			case 2:
				vendiPianta();
				break;
			case 3:
				situaEuro();
				break;
			}
		}while(scelta!=4);
	}

	void inizio() {
		int nscaf;
		do{
			System.out.println("Quanti scaffali vuoi che abbia il tuo negozio?");
			nscaf=Integer.parseInt(input.nextLine());
		}while(nscaf<=0);
		negozio = new Negozio(nscaf);
		for (int i=0;i<nscaf;i++) {
			int np=0;
			do{
				System.out.println("Quante piante puo' contenere il "+(i+1)+" scaffale?");
				np=Integer.parseInt(input.nextLine());
			}while(np<=0);
			negozio.setScaffale(i,np);
		}
	}

	int menu() {
		int scelta=0;
		System.out.println("1. Aggiungi pianta\n2. Vendi pianta\n3. Situazione economica\n4. Esci\n\nInserisci il numero scelto");
		scelta=Integer.parseInt(input.nextLine());
		return scelta;
	}

	void addPianta() {
		String specie,taglia;
		int anno;
		double prezzo;
		int scaffale,pos,codice;
		boolean bool=true;
		System.out.println("Inserisci la specie della pianta");
		specie=input.nextLine();
		System.out.println("Inserisci la taglia della pianta");
		taglia=input.nextLine();
		System.out.println("Inserisci l'anno della pianta");
		anno=Integer.parseInt(input.nextLine());
		System.out.println("Inserisci il prezzo della pianta");
		prezzo=Double.parseDouble(input.nextLine());
		System.out.println("Inserisci il numero dello scaffale");
		scaffale=Integer.parseInt(input.nextLine());
		scaffale--;
		System.out.println("Inserisci il numero di posizione");
		pos=Integer.parseInt(input.nextLine());
		pos--;
		System.out.println("Inserisci codice numerico per identificare la pianta");
		codice=Integer.parseInt(input.nextLine());
		Pianta pianta = new Pianta(specie, taglia, anno, prezzo, codice);
		bool=negozio.addPianta(pianta, scaffale, pos);
		if (bool==true) {
			System.out.println("Pianta inserita");
		}else System.out.println("Il posto richiesto è occupato o non esiste o non hai abbastanza soldi per comprare la pianta");
	}

	void vendiPianta() {
		int scelta;
		System.out.println("1. Cerca per prezzo\n2. Cerca per specie");
		scelta=Integer.parseInt(input.nextLine());
		switch (scelta) {
		case 1:
			cercaPrezzo();
			break;
		case 2:
			cercaSpecie();
			break;
		}
	}

	void situaEuro() {
		System.out.println("Euro: "+negozio.getEuro());
	}

	void cercaPrezzo() {
		double prezzo;
		int codice;
		System.out.println("Inserisci il prezzo massimo che vuoi spendere");
		prezzo=Double.parseDouble(input.nextLine());
		System.out.println(negozio.cerca(prezzo));
		System.out.println("Inserisci il codice della pianta che vuoi comprare");
		codice=Integer.parseInt(input.nextLine());
		if (negozio.vendi(codice)==true) {
			System.out.println("Pianta venduta");
		}else {
			System.out.println("Codice sbagliato");
		}
	}

	void cercaSpecie() {
		String specie;
		System.out.println("Inserisci la specie della pianta che vuoi comprare");
		specie=input.nextLine();
		int codice;
		System.out.println(negozio.cerca2(specie));
		System.out.println("Inserisci il codice della pianta che vuoi comprare");
		codice=Integer.parseInt(input.nextLine());
		if (negozio.vendi(codice)==true) {
			System.out.println("Pianta venduta");
		}else {
			System.out.println("Codice sbagliato");
		}
	}
}
