package business;

import java.util.Scanner;

import bean.Dado;
import bean.Giocatore;

public class Main {

	Scanner input;
	Dado dado;

	public static void main(String[] args) {
		new Main();
	}
	public Main(){

		input = new Scanner(System.in);
		Giocatore giocatori[] = new Giocatore[4];

		int numFacce, numIscr;
		String nome;
		char dec;
		do{
			System.out.println("Vuoi un dado standard (a 6 facce)? (s/n)");
			dec = input.next().charAt(0);
		}while (dec != 'n' && dec != 's');

		if (dec == 's'){
		}else{
			do{
				System.out.println("Di quante facce vuoi il dado?");
				numFacce = input.nextInt();
			}while (numFacce < 2 || numFacce > 20 || numFacce%2==1);
		}

		for (int i=0;i<4;i++){
			System.out.println("Inserisci il nome del " + (i+1) + " giocatore");
			nome = input.next();
			System.out.println("Inserisci il numero di pettorina del " + (i+1) + " giocatore");
			numIscr = input.nextInt();
			giocatori[i] = new Giocatore(nome,numIscr);
		}
	}
}