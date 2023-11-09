package bean;

public class Bevanda {
	String tipo;
	double prezzo;

	boolean stuzzichino;
	
	public Bevanda(String t, double p, boolean s) {
		tipo=t;
		stuzzichino=s;
		prezzo=p;
	}

	public double getPrezzo() {
		return prezzo;
	}

	@Override
	public String toString() {
		return "Bevanda [tipo=" + tipo + ", prezzo=" + prezzo + ", stuzzichino=" + stuzzichino + "]";
	}
}
