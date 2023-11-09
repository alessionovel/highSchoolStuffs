package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.sql.SQLException;

import bean.Cane;
import bean.CaneGrande;
import bean.CaneMedio;
import bean.CanePiccolo;

public class Main {
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);
	Gestione ges = new Gestione();

	public static void main(String[] args) throws IOException, SQLException {
		new Main();
	}

	Main() throws IOException, SQLException {
		int scelta = 0;
		do {
			scelta = menu();
			if (scelta == 1) {
				newCane();
			}
			if (scelta == 2) {
				elencoNome();
			}
			if (scelta == 3) {
				elencoNum();
			}
		} while (scelta != 4);
		chiamataCani();
		System.out.println("\nTutti i cani hanno corso");
		do {
			scelta = menu2();
			if (scelta == 1) {
				graduatoria();
			}
			if (scelta == 2) {
				graduatoriaPerTaglia();
			}
		} while (scelta != 3);
		ges.closedb();
	}

	int menu() throws IOException {
		int ret = 0;
		boolean errore;
		do {
			System.out.println(
					"1. Iscrivi nuovo cane\n2. Ordina per nome cane\n3. Ordina per numero progressivo\n4. Inizia Gara\nInserisci la tua scelta");
			errore = false;
			try {
				ret = Integer.parseInt(input.readLine());
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero\n");
				errore = true;
			}
			if (ret < 1 || ret > 4) {
				errore = true;
				System.out.println("Inserire un numero tra 1 e 4\n");
			}
		} while (errore == true);
		return ret;
	}

	void newCane() throws IOException {
		String nomeCane, nomePadrone, razza;
		int num, anni = 0;
		double peso = 0;
		System.out.println("Inserisci nome del cane");
		nomeCane = input.readLine();
		System.out.println("Inserisci nome del padrone");
		nomePadrone = input.readLine();
		System.out.println("Inserisci razza del cane");
		razza = input.readLine();
		num = ges.getProgr() + 1;
		boolean errore;
		do {
			System.out.println("Inserisci anno di nascita del cane");
			errore = false;
			try {
				anni = Integer.parseInt(input.readLine());
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (anni < 1) {
				errore = true;
				System.out.println("Inserire un numero maggiore di 0");
			}
		} while (errore == true);
		do {
			System.out.println("Inserisci peso del cane");
			errore = false;
			try {
				peso = Double.parseDouble(input.readLine());
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (peso < 1) {
				errore = true;
				System.out.println("Inserire un numero maggiore di 0");
			}
		} while (errore == true);
		int taglia = 0;
		do {
			System.out.println("Di che taglia è il cane?\n1.Piccolo\n2.Medio\n3.Grande");
			errore = false;
			try {
				taglia = Integer.parseInt(input.readLine());
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero");
				errore = true;
			}
			if (taglia < 1 || taglia > 3) {
				errore = true;
				System.out.println("Inserire un numero tra 1 e 3");
			}
		} while (errore == true);
		Cane cane = null;
		if (taglia == 1) {
			String t = "S";
			cane = new CanePiccolo(nomeCane, nomePadrone, razza, num, anni, peso, t);
		} else if (taglia == 2) {
			String t = "M";
			cane = new CaneMedio(nomeCane, nomePadrone, razza, num, anni, peso, t);
		} else if (taglia == 3) {
			String t = "L";
			cane = new CaneGrande(nomeCane, nomePadrone, razza, num, anni, peso, t);
		}
		ges.newCane(cane);
	}

	void elencoNome() {
		System.out.println(ges.elencoNome());
	}

	void elencoNum() {
		System.out.println(ges.elencoNum());
	}

	void chiamataCani() throws IOException, SQLException {
		while (ges.chiamaCane() != null) {
			Cane cane = ges.chiamaCane();
			System.out.println(ges.chiamaCane());
			boolean errore;
			int tempo = 0, penalita = 0;
			do {
				System.out.println("Inserire tempo in secondi");
				errore = false;
				try {
					tempo = Integer.parseInt(input.readLine());
				} catch (NumberFormatException nf) {
					System.out.println("Inserire un numero\n");
					errore = true;
				}
				if (tempo < 1) {
					errore = true;
					System.out.println("Inserire un numero maggiore di zero");
				}
			} while (errore == true);
			do {
				System.out.println("Inserire numero penalita");
				errore = false;
				try {
					penalita = Integer.parseInt(input.readLine());
				} catch (NumberFormatException nf) {
					System.out.println("Inserire un numero\n");
					errore = true;
				}
				if (penalita < 0) {
					errore = true;
					System.out.println("Inserire un numero positivo");
				}
			} while (errore == true);
			cane.setTempo(tempo);
			cane.setPenalita(penalita);
			cane.calcPuntFinale();
			ges.datiCane(cane);
		}
	}

	int menu2() {
		int ret = 0;
		boolean errore;
		do {
			System.out.println("1. Graduatoria totale\n2. Graduatoria per taglia\n3. Fine\nInserisci la tua scelta");
			errore = false;
			try {
				try {
					ret = Integer.parseInt(input.readLine());
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			} catch (NumberFormatException nf) {
				System.out.println("Inserire un numero\n");
				errore = true;
			}
			if (ret < 1 || ret > 3) {
				errore = true;
				System.out.println("Inserire un numero tra 1 e 3\n");
			}
		} while (errore == true);
		return ret;
	}

	void graduatoria() {
		System.out.println(ges.graduatoria());
	}

	void graduatoriaPerTaglia() {
		System.out.println(ges.graduatoriaPerTaglia());
	}
}
