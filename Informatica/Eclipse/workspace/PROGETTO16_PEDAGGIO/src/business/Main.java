package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Random;

import bean.Automobile;
import bean.Camion;
import bean.Camper;
import bean.Moto;
import bean.TipoCarb;
import bean.TipoVeicolo;
import bean.Veicolo;

public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);
	int n=0;
	double euro=0;
	Veicolo veicolo;


	public static void main(String[] args) {
		new Main();
	}

	Main(){
		int scelta=0;
		do {
			scelta=menu();
			if(scelta==1) {
				nuovoVeicolo();
				controlloVeicolo();
				if (veicolo!=null) {
					euro=euro+veicolo.getEuro();
				}
			}
		}while(scelta!=2);
		System.out.println("\nNel tunnel sono entrati "+n+" veicoli\nL'incasso è stato di "+euro+" euro");
	}

	int menu(){
		int ret=0;
		boolean errore;
		do {
			System.out.println("1. Nuovo cliente\n2. Esci");
			errore=false;
			try {
				try {
					ret = Integer.parseInt(input.readLine());
				}catch(IOException ex) {
					System.out.println("Errore di digitazione");
					errore=true;
				}
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (ret!=1 && ret!=2) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 2");
			}
		}while(errore==true);
		return ret;
	}

	void nuovoVeicolo() {
		veicolo=null;
		TipoVeicolo[] x = TipoVeicolo.values();
		for (int i=0; i<x.length; i++){
			System.out.println(x[i]);
		}
		String ve="";
		TipoVeicolo v=null;
		boolean errore=false;
		do {
			System.out.println("Scegli il tipo di veicolo");
			errore=false;
			try {
				ve = input.readLine().toUpperCase();
			}catch (IOException ex) {
				System.out.println("Errore di digitazione");
			}
			try {
				v = TipoVeicolo.valueOf(ve);
			}catch(IllegalArgumentException ex) {
				System.out.println("Veicolo non riconosciuto,reinserisci");
				errore=true;
			}
		}while(errore==true);

		TipoCarb[] y = TipoCarb.values();
		for (int i=0; i<y.length; i++){
			System.out.println(y[i]);
		}
		String ca="";
		TipoCarb c=null;
		errore = false;
		do {
			System.out.println("Scegli il tipo di carburante");
			errore=false;
			try {
				ca = input.readLine().toUpperCase();
			}catch (IOException ex) {
				System.out.println("Errore di digitazione");
			}
			try {
				c = TipoCarb.valueOf(ca);
			}catch(IllegalArgumentException ex) {
				System.out.println("Carburante non riconosciuto,reinserisci");
				errore=true;
			}
			if ((v==TipoVeicolo.MOTO || v==TipoVeicolo.CAMION) && (c==TipoCarb.ELETTRICO)) {
				errore=true;
				System.out.println("Il veicolo non può andare ad elettricità");
			}
		}while(errore==true);

		if (c==TipoCarb.GAS) {
			System.out.println("I veicoli a gas non possono circolare su questa strada");
		}else {

			double serb=0, cons=0;
			Random casuale = new Random();
			double liv=0;
			do {
				System.out.println("Inserisci livello carburante");
				errore=false;
				try {
					try {
						liv = Double.parseDouble(input.readLine());
					}catch(IOException ex) {
						System.out.println("Errore di digitazione");
						errore=true;
					}
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
				if (liv<0) {
					errore=true;
					System.out.println("Inserire un numero positivo");
				}
			}while(errore==true);

			if (v==TipoVeicolo.AUTOMOBILE) {
				serb=casuale.nextInt(46)+35;
				if (c==TipoCarb.ELETTRICO) {
					cons=8;
				}else {
					cons=15;
				}
				veicolo = new Automobile(v,c,serb,cons,liv);
				n++;
			}

			if (v==TipoVeicolo.MOTO) {
				int cc=0;
				serb=casuale.nextInt(16)+5;
				cons=12;
				do {
					System.out.println("Inserisci cilindrata della moto");
					errore=false;
					try {
						try {
							cc = Integer.parseInt(input.readLine());
						}catch(IOException ex) {
							System.out.println("Errore di digitazione");
							errore=true;
						}
					}catch(NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore=true;
					}
					if (cc<0) {
						errore=true;
						System.out.println("Inserire un numero positivo");
					}
				}while(errore==true);
				if (cc>124) {
					veicolo = new Moto(v,c,serb,cons,cc,liv);
					n++;
				}else {
					System.out.println("Le moto con meno di 125 di cilindrata non possono circolare su questa strada");
				}
			}

			if (v==TipoVeicolo.CAMPER) {
				double l=0;
				serb=casuale.nextInt(46)+60;
				if (c==TipoCarb.ELETTRICO) {
					cons=10;
				}else {
					cons=18;
				}
				do {
					System.out.println("Inserisci lunghezza del camper");
					errore=false;
					try {
						try {
							l = Double.parseDouble(input.readLine());
						}catch(IOException ex) {
							System.out.println("Errore di digitazione");
							errore=true;
						}
					}catch(NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore=true;
					}
					if (l<0) {
						errore=true;
						System.out.println("Inserire un numero positivo");
					}
				}while(errore==true);
				veicolo = new Camper(v,c,serb,cons,l,liv);
				n++;
			}

			if (v==TipoVeicolo.CAMION) {
				double p=0;
				serb=casuale.nextInt(51)+130;
				cons=14;
				do {
					System.out.println("Inserisci peso del camion");
					errore=false;
					try {
						try {
							p = Double.parseDouble(input.readLine());
						}catch(IOException ex) {
							System.out.println("Errore di digitazione");
							errore=true;
						}
					}catch(NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore=true;
					}
					if (p<0) {
						errore=true;
						System.out.println("Inserire un numero positivo");
					}
				}while(errore==true);
				int num=0;
				do {
					System.out.println("Il camion trasporta liquidi infiammabili? (1=si,2=no");
					errore=false;
					try {
						try {
							num = Integer.parseInt(input.readLine());
						}catch(IOException ex) {
							System.out.println("Errore di digitazione");
							errore=true;
						}
					}catch(NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore=true;
					}
					if (num!=1 && num!=2) {
						errore=true;
						System.out.println("Inserire un numero tra 1 e 2");
					}
				}while(errore==true);
				if (num==1) {
					System.out.println("I camion che trasportano liquidi infiammabili non possono circolare su questa strada");
				}else {
					veicolo = new Camion(v,c,serb,cons,p,liv);
					n++;
				}
			}
		}
	}

	void controlloVeicolo() {
		if (veicolo!=null) {
			System.out.println(veicolo.controllo());
		}
	}
}