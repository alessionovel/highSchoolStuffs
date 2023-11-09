package business;

import java.util.Scanner;

import bean.Lampadina;

public class Main {

	private static Scanner input;

	public static void main(String[] args) {
		new Main();
	}
	public Main(){
		int scelta;
		input = new Scanner(System.in);
		int potenza, vita;
		char scelta1;
		Lampadina dina;

		do {
			System.out.println("Vuoi una lampadina standard? (s/n)");
			scelta1 = input.next().charAt(0);
		}while (scelta1 != 's' && scelta1 != 'n');
		if (scelta1 == 's') {
			dina = new Lampadina();
		}else {
			System.out.println("Inserisci la potenza: ");
			potenza = input.nextInt();
			do {
				System.out.println("Vuoi cambiare anche la Vita? ");
				scelta1 = input.next().charAt(0);
			}while (scelta1 != 's' && scelta1 != 'n');
			if (scelta1 == 's') {
				System.out.println("Inserisci la vita: ");
				vita = input.nextInt();
				dina = new Lampadina(potenza,vita);
			}else {
				dina = new Lampadina(potenza);
			}
		}

		do {
			do {
				System.out.println("1. Stato lampadina\n2. Click\n3. Esci");
				scelta = input.nextInt();
			}while (scelta < 1 || scelta > 3);
			if (scelta == 1) {
				System.out.println(dina.toString());
			}else if (scelta == 2) {
				dina.click();
			}
		}while (scelta!=3);

		System.out.println("stato=" + dina.getStato());
	}

}
