package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

import bean.Cane;
import bean.CaneGrande;
import bean.CaneMedio;
import bean.CanePiccolo;

public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);
	int n=1;
	Gestione ges = new Gestione();

	public static void main(String[] args) throws IOException {
		new Main();
	}
	Main() throws IOException{
		int scelta=0;
		do {
			scelta=menu();
			if(scelta==1) {
				newCane();
			}
			if(scelta==2) {
				elencoNome();
			}
			if(scelta==3) {
				elencoNum();
			}
		}while(scelta!=4);
		ges.elencoNum();
		chiamataCani();
		
	}


	int menu() throws IOException {
		int ret=0;
		boolean errore;
		do {
			System.out.println("1. Iscrivi nuovo cane\n2. Ordina per nome cane\n3. Ordina per numero progressivo\n4. Esci\nInserisci la tua scelta");
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
	
	void newCane() throws IOException {
		String nomeCane, nomePadrone, razza;
		int num, anni=0;
		double peso=0;
		System.out.println("Inserisci nome del cane");
		nomeCane = input.readLine();
		System.out.println("Inserisci nome del padrone");
		nomePadrone = input.readLine();
		System.out.println("Inserisci razza del cane");
		razza = input.readLine();
		num=n;
		n++;
		boolean errore;
		do {
			System.out.println("Inserisci anni del cane");
			errore=false;
			try {
				anni = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (anni<1) {
				errore=true;
				System.out.println("Inserire un numero maggiore di 0");
			}
		}while(errore==true);
		do {
			System.out.println("Inserisci peso del cane");
			errore=false;
			try {
				peso = Double.parseDouble(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (peso<1) {
				errore=true;
				System.out.println("Inserire un numero maggiore di 0");
			}
		}while(errore==true);
		int taglia=0;
		do {
			System.out.println("Di che taglia è il cane?\n1.Piccolo\n2.Medio\n3.Grande");
			errore=false;
			try {
				taglia = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (taglia<1 || taglia>3) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 3");
			}
		}while(errore==true);
		Cane cane = null;
		if (taglia==1) {
			cane = new CanePiccolo(nomeCane,nomePadrone,razza,num,anni,peso);
		}else if (taglia==2) {
			cane = new CaneMedio(nomeCane,nomePadrone,razza,num,anni,peso);
		}else if (taglia==3) {
			cane = new CaneGrande(nomeCane,nomePadrone,razza,num,anni,peso);
		}
		ges.newCane(cane);
	}
	
	void elencoNome() {
		System.out.println(ges.elencoNome());
	}
	
	void elencoNum() {
		System.out.println(ges.elencoNum());
	}
	
	void chiamataCani() throws IOException {
		for(int i=1;i<n;i++) {
			System.out.println(i+" cane "+ges.chiamaCane(i));
			boolean errore;
			int tempo=0,penalita=0;
			do {
				System.out.println("Inserire tempo in secondi");
				errore=false;
				try {
					tempo = Integer.parseInt(input.readLine());
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero\n");
					errore=true;
				}
				if (tempo<1) {
					errore=true;
					System.out.println("Inserire un numero maggiore di zero");
				}
			}while(errore==true);
			do {
				System.out.println("Inserire numero penalita");
				errore=false;
				try {
					penalita = Integer.parseInt(input.readLine());
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero\n");
					errore=true;
				}
				if (penalita<0) {
					errore=true;
					System.out.println("Inserire un numero positivo");
				}
			}while(errore==true);
			ges.datiCane((i-1),tempo,penalita);
		}
	}
}
