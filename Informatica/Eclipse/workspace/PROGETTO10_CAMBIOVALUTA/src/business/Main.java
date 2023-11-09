package business;

import java.util.Scanner;

import bean.Valuta;

public class Main {

	Scanner input;
	Valuta cassa[] = new Valuta[10];
	int n, scelta;
	Gestione cambio = new Gestione();
	double guadagno=0;


	public static void main(String[] args) {
		new Main();
	}

	Main(){
		input = new Scanner(System.in);
		inizio();
		trattaMenu();
	}

	public void inizio() {
		System.out.println("Quanti tipi di valute hai?");
		n = Integer.parseInt(input.nextLine());

		for(int i=0;i<n;i++) {
			String tipo;
			double cambio,imp;
			if (i==0) {
				tipo="euro";
				System.out.println("Inserisci l'importo di euro ");
				imp = Double.parseDouble(input.nextLine());
				cambio=1;
				cassa[i]= new Valuta(tipo,imp,cambio);
			}else {
				System.out.println("Inserisci il tipo della "+ (i+1) + " valuta: ");
				tipo = input.nextLine();
				System.out.println("Inserisci l'importo della "+ (i+1) + " valuta: ");
				imp = Double.parseDouble(input.nextLine());
				System.out.println("Inserisci il coefficiente di cambio della "+ (i+1) + " valuta rispetto all'euro: ");
				cambio = Double.parseDouble(input.nextLine());
				cassa[i]= new Valuta(tipo,imp,cambio);
			}
		}
	}

	public void trattaMenu() {
		do {
			scelta=menu();
			switch (scelta) {
			case 1:
				valutaeuro();
				break;
			case 2:
				eurovaluta();
				break;
			case 3:
				mostra();
				break;
			}
		}while (scelta!=4);
	}

	public int menu(){
		int scelta;
		System.out.println("1. Cambia altra valuta in euro\n2. Cambia euro in altra valuta\n3. Mostra situazione cassa\n4. Esci\n\n");
		scelta = Integer.parseInt(input.nextLine());
		return scelta;
	}

	public void valutaeuro() {
		String nome;
		System.out.println("Inserisci il nome del tipo di valuta che vuoi cambiare in euro");
		nome = input.nextLine();
		int i=0;
		boolean trovato=false;
		while (i<n && trovato==false) {
			if (nome.equals(cassa[i].getTipo())){
				trovato=true;
			}else {
				i++;
			}
		}
		if (trovato==true) {
			double quan,guadagnoatt=0;
			System.out.println("Quanti " + cassa[i].getTipo() + " vuoi cambiare?");
			quan = Double.parseDouble(input.nextLine());
			if (cambio.cambio2(quan, cassa[i].getCambio())<cassa[0].getImp()) {
				guadagnoatt=(cambio.cambio2(quan, cassa[i].getCambio())/100*10);
				guadagnoatt=cambio.arrotondaRint(guadagnoatt, 2);
				cassa[i].setImp(cassa[i].getImp()+quan);
				cassa[0].setImp(cassa[0].getImp()-cambio.cambio2(quan, cassa[i].getCambio()));
				System.out.println("Cambio "+quan+" "+cassa[i].getTipo()+ " in "+(cambio.cambio2(quan, cassa[i].getCambio())-guadagnoatt)+ " euro\nSono stati guadagnati "+ guadagnoatt + "euro");
			}else {
				System.out.println("La cassa non ha abbastanza soldi per fare questo cambio");
			}
			guadagno=guadagno+guadagnoatt;
		}else {
			System.out.println("La cassa non cambia questa valuta");
		}
	}

	public void eurovaluta() {
		String nome;
		System.out.println("Inserisci il nome del tipo di valuta per cui vuoi cambiare gli euro");
		nome = input.nextLine();
		int i=0;
		boolean trovato=false;
		while (i<n && trovato==false) {
			if (nome.equals(cassa[i].getTipo())){
				trovato=true;
			}else {
				i++;
			}
		}
		if (trovato==true) {
			double euro,guadagnoatt=0;
			System.out.println("Quanti euro vuoi cambiare?");
			euro = Double.parseDouble(input.nextLine());
			guadagnoatt=euro/100*10;
			guadagnoatt=cambio.arrotondaRint(guadagnoatt, 2);
			euro=euro-guadagnoatt;
			if (cambio.cambio1(euro, cassa[i].getCambio())<cassa[i].getImp()) {
				cassa[0].setImp(cassa[0].getImp()+euro);
				cassa[i].setImp(cassa[i].getImp()-cambio.cambio1(euro, cassa[i].getCambio()));
				System.out.println("Cambio "+euro+" euro in "+cambio.cambio1(euro, cassa[i].getCambio())+" "+ cassa[i].getTipo()+"\nSono stati guadagnati "+ guadagnoatt + "euro");
			}else {
				System.out.println("La cassa non ha abbastanza soldi per fare questo cambio");
			}
			guadagno=guadagno+guadagnoatt;
		}else {
			System.out.println("La cassa non cambia questa valuta");
		}
	}

	public void mostra() {
		for (int i=0;i<n;i++) {
			System.out.println(cassa[i].toString());
		}
		System.out.println("Guadagno attuale= "+guadagno);
	}
}
