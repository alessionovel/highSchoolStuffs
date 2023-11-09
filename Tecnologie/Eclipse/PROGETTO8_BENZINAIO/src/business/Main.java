package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

import util.Params;

public class Main {
	
	BufferedReader input = new BufferedReader(new InputStreamReader(System.in));

	public static void main(String[] args) {
		new Main();
	}
	
	Main() {
		boolean error = false;
		int n=0;
		do {
			error = false;
			try {
				System.out.print("Inserisci il numero di pompe di benzina: ");
				n = Integer.parseInt(input.readLine());
			} catch (NumberFormatException e) {
				System.out.println("Digita un numero!");
				error = true;
			} catch (IOException e) {
				error = true;
			}
			if (n<1) {
				System.out.println("Digita un numero positivo maggiore di 0");
				error=true;
			}
		} while (error);
		Params.nPompe=n;
		Benzinaio benzinaio = new Benzinaio();
		Produttore generaAuto = new Produttore(benzinaio);
		Stampa mostra = new Stampa(benzinaio);
		Consumatore[] cons = new Consumatore[Params.nPompe];
		for(int i=0;i<Params.nPompe;i++) {
			cons[i] = new Consumatore(benzinaio,i);
		}
		
		mostra.start();
		generaAuto.start();
		for(int i=0;i<Params.nPompe;i++) {
			cons[i].start();
		}
	}

}
