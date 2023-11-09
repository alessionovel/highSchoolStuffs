package bean;

public class Pianta {
	private String specie, famiglia, taglia;
	private int codice;
	private double prezzo;

	public Pianta() {
		specie = null;
		famiglia = null;
		taglia = null;
		codice = 0;
		prezzo = 0;
	}

	public Pianta(String specie,String famiglia,String taglia,int codice,double prezzo) {
		this.specie = specie;
		this.famiglia = famiglia;
		this.taglia = taglia;
		this.codice = codice;
		this.prezzo = prezzo;
	}

	public String toString() {
		return "Pianta [specie=" + specie + ", famiglia=" + famiglia + ", taglia=" + taglia + ", codice=" + codice
				+ ", prezzo=" + prezzo + "]";
	}

	public String getSpecie() {
		return specie;
	}

	public String getFamiglia() {
		return famiglia;
	}

	public String getTaglia() {
		return taglia;
	}

	public int getCodice() {
		return codice;
	}

	public double getPrezzo() {
		return prezzo;
	}
}