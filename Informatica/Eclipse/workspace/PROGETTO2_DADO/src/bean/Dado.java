package bean;

import java.util.Random;

public class Dado {
	private int numFacce, numero;
	Random casuale = new Random();

	public double getNumero() {
		return numero;
	}

	public int getNumFacce() {
		return numFacce;
	}

	public Dado(int numFacce) {
		numero = 0;
		this.numFacce = numFacce;
	}

	public void casuale(){
		numero = casuale.nextInt(numFacce)+1;
	}
}