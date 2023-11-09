package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

import util.TipoConc;

public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);
	Gestione ges = new Gestione();

	public static void main(String[] args) throws IOException {
		new Main();
	}

	Main() throws IOException{
		int scelta=0;
		System.out.println("Benvenuto nel programma gestione gara!");
		do {
			scelta=menu();
			if(scelta==1) {
				aggiungiP();
			}
			if(scelta==2) {
				partenzaGara();
			}
			if(scelta==3) {
				if (ges.inizioGara==true) {
					arrivo();
				}else {
					System.out.println("Devi prima far iniziare la gara");
				}

			}
			if(scelta==4) {
				elenco();
			}
			if(scelta==5) {
				pasto();
			}
			if(scelta==6){
				classifica();
			}
		}while(scelta!=7);
	}

	public int menu() throws IOException {
		int ret=0;
		boolean errore;
		do {
			System.out.println("\n\n1. Aggiungi partecipante\n2. Partenza della gara\n3. Arrivo del concorrente\n4. Elenco pasti\n5. Consegna pasto\n6. Visualizza classifica\n7. Esci\nInserisci la tua scelta");
			errore=false;
			try {
				ret = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (ret<1 || ret>7) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 6");
			}
		}while(errore==true);
		return ret;
	}

	public void aggiungiP() throws IOException {
		String nome, cognome, numero;
		TipoConc c=null;
		if (ges.inizioGara==false) {
			TipoConc[] x = TipoConc.values();
			for (int i=0; i<x.length; i++){
				System.out.println(x[i]);
			}
			String con="";
			boolean errore=false;
			do {
				System.out.println("Inserire categoria concorrente");
				errore=false;
				con = input.readLine().toUpperCase();
				try {
					c = TipoConc.valueOf(con);
				}catch(IllegalArgumentException ex) {
					System.out.println("Categoria non valida, reinserisci");
					errore=true;
				}
			}while(errore==true);
			System.out.println("Inserire nome concorrente");
			nome = input.readLine();
			System.out.println("Inserire cognome concorrente");
			cognome = input.readLine();
			System.out.println("Inserire numero tessera concorrente");
			numero = input.readLine();
			int cib=0;
			String cibo="";
			do {
				System.out.println("Scegli il pasto:\n1. Pasto vegetariano\n2. A base di carne");
				errore=false;
				try {
					cib = Integer.parseInt(input.readLine());
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
				if (cib<1 || cib>2) {
					errore=true;
					System.out.println("Inserire un numero tra 1 e 2");
				}
			}while(errore==true);
			if (cib==1) cibo="Pasto vegetariano";
			if (cib==2) cibo="A base di carne";
			if (c==TipoConc.UNDER) {
				aggiungiUnder(nome, cognome, numero, cibo);
			}else if(c==TipoConc.ADULTO) {
				aggiungiAdulto(nome, cognome, numero, cibo);
			}else {
				aggiungiOver(nome, cognome, numero, cibo);
			}
		}else {
			System.out.println("Non si possono aggiungere partecipanti dopo l'inizio della gara");
		}
	}

	public void aggiungiUnder(String nome, String cognome, String numero, String cibo) throws IOException {
		boolean errore2=false;
		if (cibo.equals("A base di carne")) {
			cibo="Panino di hamburger e patatine";
		}else {
			cibo="Pizza margherita";
		}
		int mese=0,anno=0,bib=0;;
		boolean errore;
		String bibita="";
		do {
			System.out.println("Inserire mese di nascita concorrente");
			errore=false;
			try {
				mese = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (mese<1 || mese>12) {
				errore=true;
				System.out.println("Inserire il numero di un mese accettabile");
			}
		}while(errore==true);
		do {
			System.out.println("Inserire anno di nascita concorrente");
			errore=false;
			try {
				anno = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (anno<2005 || anno>2015) {
				if (anno<2005 && anno>1949) {
					System.out.println("Hai sbagliato categoria, sei negli ADULTI!");
					errore2=true;
				}else if(anno<1949 && anno>1919) {
					System.out.println("Hai sbagliato categoria, sei negli OVER!");
					errore2=true;
				}else {
					System.out.println("Inserire un'anno accettabile");
					errore=true;
				}
			}
		}while(errore==true);
		if(errore2==false) {
			do {
				System.out.println("Scegli la bibita:\n1. Aranciata\n2. Coca Cola\n3. Acqua");
				errore=false;
				try {
					bib = Integer.parseInt(input.readLine());
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
				if (bib<1 || bib>3) {
					errore=true;
					System.out.println("Inserire un numero tra 1,2 e 3");
				}
			}while(errore==true);
			if (bib==1) bibita="Aranciata";
			if (bib==2) bibita="Coca Cola";
			if (bib==3) bibita="Acqua";
			System.out.println(ges.aggU(nome,cognome,numero,cibo,bibita,mese,anno));
		}
	}

	public void aggiungiAdulto(String nome, String cognome, String numero, String cibo) throws IOException {
		boolean errore;
		String bibita="";
		int bib=0;
		do {
			System.out.println("Scegli la bibita:\n1. Vino\n2. Birra\n3. Bibita analcolica");
			errore=false;
			try {
				bib = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (bib<1 || bib>3) {
				errore=true;
				System.out.println("Inserire un numero tra 1,2 e 3");
			}
		}while(errore==true);
		if (bib==1) bibita="Vino";
		if (bib==2) bibita="Birra";
		if (bib==3) bibita="Bibita Analcolica";
		System.out.println(ges.agg(nome,cognome,numero,cibo,bibita));
	}

	public void aggiungiOver(String nome, String cognome, String numero, String cibo) throws IOException {
		boolean errore;
		String bibita="";
		int bib=0;
		do {
			System.out.println("Scegli la bibita:\n1. Birra\n2. Bibita analcolica");
			errore=false;
			try {
				bib = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (bib<1 || bib>2) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 2");
			}
		}while(errore==true);
		if (bib==1) bibita="Birra";
		if (bib==2) bibita="Bibita Analcolica";
		System.out.println(ges.agg(nome,cognome,numero,cibo,bibita));
	}

	public void partenzaGara() {
		System.out.println(ges.inizio());
	}

	public void arrivo() throws IOException {
		int num=0, min=0, ora=0;
		boolean errore=false;
		do {
			System.out.println("Inserisci il numero di pettorina dell'atleta arrivato");
			errore=false;
			try {
				num = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (num<1 || num>100) {
				errore=true;
				System.out.println("Inserire il numero di un pettorina accettabile");
			}
		}while(errore==true);
		do {
			System.out.println("Inserisci l'ora");
			errore=false;
			try {
				ora = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (ora<9 || ora>13) {
				errore=true;
				System.out.println("Inserire un numero di ora accettabile (la gara finisce alle 13)");
			}
		}while(errore==true);
		do {
			System.out.println("Inserisci il minuto");
			errore=false;
			try {
				min = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (min<0 || min>59) {
				errore=true;
				System.out.println("Inserire un numero di minuto accettabile");
			}
			if (ora==13) {
				if (min!=0) {
					System.out.println("La gara finisce alle 20 in punto");
					errore=true;
				}
			}else if (ora==9 && min<30) {
				System.out.println("L'atleta non può arrivare prima dell'inizio della gara");
				errore=true;
			}
		}while(errore==true);
		System.out.println(ges.arrivo(num,ora,min));
	}

	public void elenco() {
		System.out.println(ges.elenco());
	}

	public void pasto() throws IOException {
		boolean errore=false;
		int num=0;
		do {
			System.out.println("Inserisci il numero di pettorina");
			errore=false;
			try {
				num = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (num<1 || num>100) {
				errore=true;
				System.out.println("Inserire il numero di un pettorina accettabile");
			}
		}while(errore==true);
		num--;
		System.out.println(ges.pasto(num));
	}

	public void classifica() throws IOException{
		if(ges.controllaClassifica()==false){
			System.out.println("Devono prima arrivare tutti i concorrenti");
		}else{
			boolean errore;
			int scelta=0;
			do {
				System.out.println("\n1. Per tempo\n2. Per nome\n3. Per pettorina");
				errore=false;
				try {
					scelta = Integer.parseInt(input.readLine());
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
				if (scelta<1 ||scelta>3) {
					errore=true;
					System.out.println("Inserire il numero accettabile");
				}
			}while(errore==true);
			if (scelta==1){
				System.out.println(ges.ordina());
			}else if (scelta==2){
				System.out.println(ges.ordinaNome());
			}else if (scelta==3){
				System.out.println(ges.ordinaPett());
			}
		}
	}
}
