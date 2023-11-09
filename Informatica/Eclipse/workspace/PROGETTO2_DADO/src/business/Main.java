package business;

import java.util.Scanner;

import bean.Dado;

public class Main {

	private static Scanner input;

	public static void main(String[] args) {
		input = new Scanner(System.in);
		int numFacce, numero, win=0, tot=0;
		Dado dado;
		char dec;

		do{
			System.out.println("Di quante facce vuoi il dado?");
			numFacce = input.nextInt();
		}while (numFacce < 2 || numFacce > 20);
		dado = new Dado(numFacce);

		do {
			do{
				System.out.println("Scegli un numero su cui scommettere: ");
				numero = input.nextInt();
			}while (numero < 1 || numero > dado.getNumFacce());
			dado.casuale();
			if (dado.getNumero()==numero){
				System.out.println("Hai indovinato!");
				win++;
			}else{
				System.out.println("Hai sbagliato!");
			}
			do{
				System.out.println("Vuoi continuare? (s/n)");
				dec = input.next().charAt(0);
			}while (dec != 'n' && dec != 's');
			tot++;
		}while (dec!='n');
		System.out.println("Hai vinto " + win + " su " + tot + " volte!");
	}

}