package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

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
			scelta = menu();
			if (scelta == 1) {
				nuovoOrdine();
			}
			if (scelta == 2) {
				prepOrd();
			}
			if (scelta == 3) {
				consegnaVassoio();
			}
			if (scelta == 4) {
				conto();
			}
			if (scelta == 5) {
				pagaConto();
			}
		} while (scelta != 6);
		ges.chiusura();
	}

	int menu() throws IOException {
		int ret = 0;
		boolean errore;
		do {
			System.out.println(
					"\n\n1. Nuovo ordine\n2. Prepara prossimo ordine\n3. Consegna Vassoio\n4. Vedi conto\n5. Paga conto\n6. Esci");
			errore = false;
			try {
				ret = Integer.parseInt(input.readLine());
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (ret < 1 || ret > 6) {
				errore = true;
				System.out.println("Inserire un numero tra 1 e 6");
			}
		} while (errore == true);
		return ret;
	}

	void nuovoOrdine() throws IOException {
		System.out.println("Inserisci numero tavolo: ");
		int tav = Integer.parseInt(input.readLine());
		double conto = 0;
		int nOrd = ges.getNum();
		int scelta = 0;
		do {
			boolean errore;
			do {
				System.out.println("1. Aggiungi snack\n2. Aggiungi bevanda\n3. Fine ordine");
				errore = false;
				try {
					scelta = Integer.parseInt(input.readLine());
				} catch (NumberFormatException nf) {
					System.out.println("Inserire un numero");
					errore = true;
				}
				if (scelta < 1 || scelta > 3) {
					errore = true;
					System.out.println("Inserire un numero tra 1 e 3");
				}
			} while (errore == true);
			if (scelta == 1) {
				int sceltaSnack = 0;
				do {
					System.out.println("1. Pizzetta €2.00\n2. Olive ascolane €2.00\n3. Tramezzino €2.00");
					errore = false;
					try {
						sceltaSnack = Integer.parseInt(input.readLine());
					} catch (NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore = true;
					}
					if (sceltaSnack < 1 || sceltaSnack > 3) {
						errore = true;
						System.out.println("Inserire un numero tra 1 e 3");
					}
				} while (errore == true);
				if (sceltaSnack == 1) {
					ges.addSnack("Pizzetta", 2, nOrd);
				} else if (sceltaSnack == 2) {
					ges.addSnack("Olive ascolane", 2, nOrd);
				} else if (sceltaSnack == 3) {
					ges.addSnack("Tramezzino", 2, nOrd);
				}
				conto = conto + 2;
			} else if (scelta == 2) {
				int sceltaBib1 = 0;
				double prezzo;
				do {
					System.out.println("1. Analcolica\n2. Alcolica");
					errore = false;
					try {
						sceltaBib1 = Integer.parseInt(input.readLine());
					} catch (NumberFormatException nf) {
						System.out.println("Inserire un numero");
						errore = true;
					}
					if (sceltaBib1 < 1 || sceltaBib1 > 2) {
						errore = true;
						System.out.println("Inserire un numero tra 1 e 2");
					}
				} while (errore == true);
				int sceltaBev = 0;
				if (sceltaBib1 == 1) {
					do {
						System.out.println(
								"1. Coca Cola\n2. Aranciata\n3. Acqua minerale\n4. Acqua tonica\n5. Sprite\n6. Chinotto");
						errore = false;
						try {
							sceltaBev = Integer.parseInt(input.readLine());
						} catch (NumberFormatException nf) {
							System.out.println("Inserire un numero");
							errore = true;
						}
						if (sceltaBev < 1 || sceltaBev > 6) {
							errore = true;
							System.out.println("Inserire un numero tra 1 e 6");
						}
					} while (errore == true);
					int sceltaGrand = 0;
					do {
						System.out.println("1. Media €1.80\n2. Grande €2.50");
						errore = false;
						try {
							sceltaGrand = Integer.parseInt(input.readLine());
						} catch (NumberFormatException nf) {
							System.out.println("Inserire un numero");
							errore = true;
						}
						if (sceltaGrand < 1 || sceltaGrand > 2) {
							errore = true;
							System.out.println("Inserire un numero tra 1 e 2");
						}
					} while (errore == true);
					String taglia;
					int sceltaStuz = 0;
					if (sceltaGrand == 1) {
						prezzo = 1.8;
						taglia = " media";
					} else {
						taglia = " grande";
						do {
							System.out.println("1. Con stuzzichino €2.90\n2. Senza stuzzichino €2.50");
							errore = false;
							try {
								sceltaStuz = Integer.parseInt(input.readLine());
							} catch (NumberFormatException nf) {
								System.out.println("Inserire un numero");
								errore = true;
							}
							if (sceltaStuz < 1 || sceltaStuz > 2) {
								errore = true;
								System.out.println("Inserire un numero tra 1 e 2");
							}
						} while (errore == true);
						if (sceltaStuz == 1) {
							prezzo = 2.9;
						} else {
							prezzo = 2.5;
							sceltaStuz = 0;
						}
					}
					if (sceltaBev == 1) {
						ges.addBev(nOrd, "Coca Cola" + taglia, sceltaStuz, prezzo);
					} else if (sceltaBev == 2) {
						ges.addBev(nOrd, "Aranciata" + taglia, sceltaStuz, prezzo);
					} else if (sceltaBev == 3) {
						ges.addBev(nOrd, "Acqua minerale" + taglia, sceltaStuz, prezzo);
					} else if (sceltaBev == 4) {
						ges.addBev(nOrd, "Acqua tonica" + taglia, sceltaStuz, prezzo);
					} else if (sceltaBev == 5) {
						ges.addBev(nOrd, "Sprite" + taglia, sceltaStuz, prezzo);
					} else if (sceltaBev == 6) {
						ges.addBev(nOrd, "Chinotto" + taglia, sceltaStuz, prezzo);
					}
				} else {
					do {
						System.out.println(
								"1. Birra media bionda €4.50\n2. Birra media rossa €4.50\n3. Bicchiere di prosecco €4.50\n4. Mohito €4.50\n5. Cuba Libre €4.50\n6. Cocktail della casa €4.50");
						errore = false;
						try {
							sceltaBev = Integer.parseInt(input.readLine());
						} catch (NumberFormatException nf) {
							System.out.println("Inserire un numero");
							errore = true;
						}
						if (sceltaBev < 1 || sceltaBev > 6) {
							errore = true;
							System.out.println("Inserire un numero tra 1 e 6");
						}
					} while (errore == true);
					prezzo = 4.50;
					int stuzz = 1;
					if (sceltaBev == 1) {
						ges.addBev(nOrd, "Birra media bionda", stuzz, prezzo);
					} else if (sceltaBev == 2) {
						ges.addBev(nOrd, "Birra media rossa", stuzz, prezzo);
					} else if (sceltaBev == 3) {
						ges.addBev(nOrd, "Bicchiere di prosecco", stuzz, prezzo);
					} else if (sceltaBev == 4) {
						ges.addBev(nOrd, "Mohito", stuzz, prezzo);
					} else if (sceltaBev == 5) {
						ges.addBev(nOrd, "Cuba Libre", stuzz, prezzo);
					} else if (sceltaBev == 6) {
						ges.addBev(nOrd, "Cocktail della casa", stuzz, prezzo);
					}
				}
				conto = conto + prezzo;
			}
		} while (scelta != 3);
		ges.fineOrdine(nOrd, tav, conto);
	}
	
	public void prepOrd() {
		System.out.println(ges.prepOrd());
	}
	
	public void consegnaVassoio() {
		int nOrd = 0;
		boolean errore;
		do {
			System.out.println("Inserisci numero ordine vassoio consegnato: ");
			errore = false;
			try {
				try {
					nOrd = Integer.parseInt(input.readLine());
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (nOrd < 1 || nOrd>(ges.getNum()-1)) {
				errore = true;
				System.out.println("Inserire un numero positivo/che non superi il numero di ordini");
			}
		} while (errore == true);
		System.out.println(ges.consegnaVassoio(nOrd));
	}
	
	public void conto() {
		int nTav = 0;
		boolean errore;
		do {
			System.out.println("Inserisci numero del tavolo: ");
			errore = false;
			try {
				try {
					nTav = Integer.parseInt(input.readLine());
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (nTav < 1) {
				errore = true;
				System.out.println("Inserire un numero positivo");
			}
		} while (errore == true);
		System.out.println("Il conto del tavolo è di: " + ges.conto(nTav) + "€");
	}
	
	public void pagaConto() {
		int nTav = 0;
		boolean errore;
		do {
			System.out.println("Inserisci numero del tavolo: ");
			errore = false;
			try {
				try {
					nTav = Integer.parseInt(input.readLine());
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (nTav < 1) {
				errore = true;
				System.out.println("Inserire un numero positivo");
			}
		} while (errore == true);
		ges.pagaConto(nTav);
	}
}
