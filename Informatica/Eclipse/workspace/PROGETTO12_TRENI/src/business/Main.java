package business;

import java.util.Scanner;

import bean.VagoneMerci;


public class Main {
	String tipo;
	int cont=0,pesomerci=0,pesomax=0;
	int scelta=0;
	Scanner input = new Scanner(System.in);
	Gestione gestione= new Gestione();

	public static void main(String[] args) {
		new Main();
	}

	public Main(){
		do {
			menu();
			if(scelta==1) {
				nuovotreno();
			}
			if(scelta==2) {
				modificatreno();
			}
			if(scelta==3) {
				visualizzatreno();
			}
		}while(scelta!=4);
	}

	void menu() {
		System.out.println("\n----.MENU.----\n\n[1].Nuovo Treno\n[2].Modifica treno\n[3].Visualizza treno\n[4].Esci\n");
		scelta = Integer.parseInt(input.nextLine());
	}

	void nuovotreno() {
		System.out.println("Inserisci il peso massimo che può trasportare treno(in kg): ");
		double pesomax = Double.parseDouble(input.nextLine());
		System.out.println("Inserisci la città di partenza del treno: ");
		String cittaP = input.nextLine();
		System.out.println("Inserisci la città di arrivo del treno: ");
		String cittaA= input.nextLine();
		System.out.println("Orario di partenza: ");
		int oraP = Integer.parseInt(input.nextLine());
		System.out.println("Orario di arrivo: ");
		int oraA = Integer.parseInt(input.nextLine());
		gestione.aggTreno(pesomax,cittaP,cittaA,oraP,oraA);
	}

	void modificatreno() {
		System.out.println("Che treno vuoi modificare?");
		int nt=Integer.parseInt(input.nextLine());
		System.out.println("Vuoi aggiungere(1) o eliminare(2) un vagone?");
		int scelta2=Integer.parseInt(input.nextLine());
		if (scelta2==1) {
			System.out.println("Inserisci codice vagone in cifre");
			int codice=Integer.parseInt(input.nextLine());
			System.out.println("Inserisci tara vagone");
			double tara=Double.parseDouble(input.nextLine());
			System.out.println("Inserisci anno vagone in cifre");
			int anno=Integer.parseInt(input.nextLine());
			System.out.println("Vuoi un vagone merci(1) o vagone persone(2)?");
			int scelta3=Integer.parseInt(input.nextLine());
			if (scelta3==1) {
				System.out.println("Inserisci peso merci");
				double pesomerci=Integer.parseInt(input.nextLine());
				VagoneMerci vagone=new VagoneMerci(codice, tara, anno, pesomerci);
				if (gestione.newVag(vagone, nt)==false) {
					System.out.println("Errore, riprova");
				}
			}else if (scelta3==2) {
				System.out.println("Inserisci numero di persone");
				int numPosti=Integer.parseInt(input.nextLine());

			}

		}
	}


	void visualizzatreno() {

	}

}
