package bean;

public class Pianta {
	String specie,taglia;
	int anno,codice;
	double prezzo;
	public Pianta(){
		specie=null;
		taglia=null;
		anno=0;
		prezzo=0;
	}
	public Pianta(String specie, String taglia, int anno, double prezzo, int codice){
		this.specie=specie;
		this.taglia=taglia;
		this.anno=anno;
		this.prezzo=prezzo;
		this.codice=codice;
	}
	public void setPrezzo(double prezzo) {
		this.prezzo = prezzo;
	}
	@Override
	public String toString() {
		return "Pianta [specie=" + specie + ", taglia=" + taglia + ", anno=" + anno + ", prezzo="+ prezzo + ", codice=" + codice + "]\n";
	}
	public String getSpecie() {
		return specie;
	}
	public int getCodice() {
		return codice;
	}
	public double getPrezzo() {
		return prezzo;
	}
}
