package bean;

import java.util.Random;

public class Dado {
	private int numFacce, numero;
	Random casuale = new Random();

	public double getNumero() {
		return numero;
	}

	public Dado() {
		numero = 0;
		numFacce = 6;
	}

	public void casuale(){
		numero = casuale.nextInt(numFacce)+1;
	}
}