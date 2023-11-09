package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

import bean.Bevanda;
import bean.Snack;

public class Main {

	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);
	Gestione ges = new Gestione();

	public static void main(String[] args) throws IOException {
		new Main();
	}
	Main() throws IOException {
		int scelta;
		do {
			scelta=menu();
			if(scelta==1) {
				nuovoOrdine();
			}
			if(scelta==2) {
				proxBev();
			}
			if(scelta==3) {
				proxSnack();
			}
			if(scelta==4) {
				consegnaVassoio();
			}
		}while(scelta!=5);
	}

	int menu() throws IOException {
		int ret=0;
		boolean errore;
		do {
			System.out.println("\n\n1. Nuovo ordine\n2. Visualizza prossimo ordine bevande\n3. Visualizza prossimo ordine snack\n4. Consegna Vassoio\n5. Esci");
			errore=false;
			try {
				ret = Integer.parseInt(input.readLine());
			}catch(NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore=true;
			}
			if (ret<1 || ret>6) {
				errore=true;
				System.out.println("Inserire un numero tra 1 e 6");
			}
		}while(errore==true);
		return ret;
	}

	void nuovoOrdine() throws IOException {
		System.out.println("Inserisci numero tavolo: ");
		int tav = Integer.parseInt(input.readLine());
		ges.nuovoOrdine(tav);
		int scelta=0;
		do {
			boolean errore;
			do {
				System.out.println("1. Aggiungi snack\n2. Aggiungi bevanda\n3. Fine ordine");
				errore=false;
				try {
					scelta = Integer.parseInt(input.readLine());
				}catch(NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore=true;
				}
				if (scelta<1 || scelta>3) {
					errore=true;
					System.out.println("Inserire un numero tra 1 e 3");
				}
			}while(errore==true);

			if (scelta==1) {
				int sceltaSnack=0;
				do {
					System.out.println("1. Pizzetta €2.00\n2. Olive ascolane €2.00\n3. Tramezzino €2.00");
					errore=false;
					try {
						sceltaSnack = Integer.parseInt(input.readLine());
					}catch(NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore=true;
					}
					if (sceltaSnack<1 || sceltaSnack>3) {
						errore=true;
						System.out.println("Inserire un numero tra 1 e 3");
					}
				}while(errore==true);
				if (sceltaSnack==1) {
					ges.addSnack(new Snack("Pizzetta",2));
				}else if (sceltaSnack==2) {
					ges.addSnack(new Snack("Olive ascolane",2));
				}else if (sceltaSnack==3) {
					ges.addSnack(new Snack("Tramezzino",2));
				}
			}else if (scelta==2) {
				int sceltaBib1=0;
				do {
					System.out.println("1. Analcolica\n2. Alcolica");
					errore=false;
					try {
						sceltaBib1 = Integer.parseInt(input.readLine());
					}catch(NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore=true;
					}
					if (sceltaBib1<1 || sceltaBib1>2) {
						errore=true;
						System.out.println("Inserire un numero tra 1 e 2");
					}
				}while(errore==true);
				int sceltaBev=0;
				if(sceltaBib1==1) {
					do {
						System.out.println("1. Coca Cola\n2. Aranciata\n3. Acqua minerale\n4. Acqua tonica\n5. Sprite\n6. Chinotto");
						errore=false;
						try {
							sceltaBev = Integer.parseInt(input.readLine());
						}catch(NumberFormatException nf) {
							System.out.println("Inserire un numero");
							errore=true;
						}
						if (sceltaBev<1 || sceltaBev>6) {
							errore=true;
							System.out.println("Inserire un numero tra 1 e 6");
						}
					}while(errore==true);
					int sceltaGrand=0;
					do {
						System.out.println("1. Media €1.80\n2. Grande €2.50");
						errore=false;
						try {
							sceltaGrand = Integer.parseInt(input.readLine());
						}catch(NumberFormatException nf) {
							System.out.println("Inserire un numero");
							errore=true;
						}
						if (sceltaGrand<1 || sceltaGrand>2) {
							errore=true;
							System.out.println("Inserire un numero tra 1 e 2");
						}
					}while(errore==true);
					double prezzo;
					boolean stuzz=false;
					if (sceltaGrand==1) {
						prezzo=1.8;
					}else {
						int sceltaStuz=0;
						do {
							System.out.println("1. Con stuzzichino €2.90\n2. Senza stuzzichino €2.50");
							errore=false;
							try {
								sceltaStuz = Integer.parseInt(input.readLine());
							}catch(NumberFormatException nf) {
								System.out.println("Inserire un numero");
								errore=true;
							}
							if (sceltaStuz<1 || sceltaStuz>2) {
								errore=true;
								System.out.println("Inserire un numero tra 1 e 2");
							}
						}while(errore==true);
						if (sceltaStuz==1) {
							prezzo=2.9;
							stuzz=true;
						}else {
							prezzo=2.5;
							stuzz=false;
						}
					}
					if (sceltaBev==1) {
						ges.addBev(new Bevanda("Coca Cola",prezzo,stuzz));
					}else if (sceltaBev==2) {
						ges.addBev(new Bevanda("Aranciata",prezzo,stuzz));
					}else if (sceltaBev==3) {
						ges.addBev(new Bevanda("Acqua minerale",prezzo,stuzz));
					}else if (sceltaBev==4) {
						ges.addBev(new Bevanda("Acqua tonica",prezzo,stuzz));
					}else if (sceltaBev==5) {
						ges.addBev(new Bevanda("Sprite",prezzo,stuzz));
					}else if (sceltaBev==6) {
						ges.addBev(new Bevanda("Chinotto",prezzo,stuzz));
					}
				}else{
					do {
						System.out.println("1. Birra media bionda €4.50\n2. Birra media rossa €4.50\n3. Bicchiere di prosecco €4.50\n4. Mohito €4.50\n5. Cuba Libre €4.50\n6. Cocktail della casa €4.50");
						errore=false;
						try {
							sceltaBev = Integer.parseInt(input.readLine());
						}catch(NumberFormatException nf) {
							System.out.println("Inserire un numero");
							errore=true;
						}
						if (sceltaBev<1 || sceltaBev>6) {
							errore=true;
							System.out.println("Inserire un numero tra 1 e 6");
						}
					}while(errore==true);
					double prezzo=4.50;
					boolean stuzz=true;
					if (sceltaBev==1) {
						ges.addBev(new Bevanda("Birra media bionda",prezzo,stuzz));
					}else if (sceltaBev==2) {
						ges.addBev(new Bevanda("Birra media rossa",prezzo,stuzz));
					}else if (sceltaBev==3) {
						ges.addBev(new Bevanda("Bicchiere di prosecco",prezzo,stuzz));
					}else if (sceltaBev==4) {
						ges.addBev(new Bevanda("Mohito",prezzo,stuzz));
					}else if (sceltaBev==5) {
						ges.addBev(new Bevanda("Cuba Libre",prezzo,stuzz));
					}else if (sceltaBev==6) {
						ges.addBev(new Bevanda("Cocktail della casa",prezzo,stuzz));
					}
					
				}
			}
		}while (scelta!=3);
		ges.fineOrdine();
	}

	void proxBev(){
		System.out.println(ges.proxBev());
	}
	
	void proxSnack(){
		System.out.println(ges.proxSnack());
	}
	
	void consegnaVassoio() {
		System.out.println(ges.consegna());
	}
}
