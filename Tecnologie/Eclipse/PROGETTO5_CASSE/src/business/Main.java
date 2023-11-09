package business;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Main {

	InputStreamReader leggi = new InputStreamReader(System.in);
	BufferedReader input = new BufferedReader(leggi);

	public static void main(String[] args) {
		new Main();
	}

	Main() {
		int nArt = 0, t = 0, nCas = 0;
		Supermercato supermercato = new Supermercato(nCas);
		Cassa casse[];
		System.out.println("Quante casse ci sono?(Da 1 a 4)");
		try {
			nCas = Integer.parseInt(input.readLine());
		} catch (NumberFormatException | IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		System.out.println("Qual'è il numero massimo di articoli per carrello?");
		try {
			nArt = Integer.parseInt(input.readLine());
		} catch (NumberFormatException | IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		System.out.println("Inserisci tempo di interarrivo");
		try {
			t = Integer.parseInt(input.readLine());
		} catch (NumberFormatException | IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		casse = new Cassa[nCas];
		for (int i = 0; i < nCas; i++) {
			casse[i] = new Cassa(supermercato);
		}
		Conta conta = new Conta(nCas,casse);
		conta.start();
		Cliente clienti = new Cliente(supermercato, t, nArt);
		Mostra mostra = new Mostra(supermercato, casse, nCas);
		clienti.start();
		for (int i = 0; i < nCas; i++) {
			casse[i].start();
		}
		mostra.start();

	}
}
