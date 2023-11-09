package business;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Scanner;

import bean.Analisi;

public class Main {
	Analisi analisi = new Analisi();
	Scanner sc = new Scanner(System.in);
	BufferedReader leggiFile = null;
	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);

	public static void main(String[] args) throws IOException {
		new Main();
	}

	Main() throws IOException {
		int scelta = 0;
		do {
			scelta = menu();
			if (scelta == 1) {
				decifraFile();
			}
			if (scelta == 2) {
				decifraInput();
			}
		} while (scelta != 3);
	}

	int menu() throws IOException {
		int ret = 0;
		boolean errore;
		do {
			System.out.println(
					"1. Decifratura da file\n2. Decifratura da input della tastiera\n3. Esci\nInserisci la tua scelta");
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

	void decifraFile() throws IOException {
		System.out.println("Copia e incolla il percorso del file che vuoi decifrare");
		String percorso = input.readLine();
		leggiFile = new BufferedReader(new FileReader(percorso));
		String file = "";
		String testo = leggiFile.readLine();
		while (testo != null) {
			file = file + testo;
			testo = leggiFile.readLine();
		}
		System.out.println(file);
		System.out.println(analisi.analisi(file) + "\n");
	}

	void decifraInput() throws IOException {
		System.out.println("Inserisci il testo che vuoi decifrare");
		String testo = input.readLine();
		System.out.println(analisi.analisi(testo) + "\n");
	}

}
