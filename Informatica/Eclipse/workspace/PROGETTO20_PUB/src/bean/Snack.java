package bean;

public class Snack {
	String tipo;
	double prezzo;
	
	public Snack(String t, double p) {
		tipo=t;
		prezzo=p;
	}

	public double getPrezzo() {
		return prezzo;
	}

	@Override
	public String toString() {
		return "Snack [tipo=" + tipo + ", prezzo=" + prezzo + "]";
	}
}
