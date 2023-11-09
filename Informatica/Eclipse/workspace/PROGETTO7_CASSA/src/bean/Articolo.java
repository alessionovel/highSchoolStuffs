package bean;

public class Articolo {
	private int quantita, prezzo;
	private String codice;

	public Articolo(String codice,int prezzo){
		quantita=1;
		this.codice = codice;
		this.prezzo = prezzo;
	}

	public int getPrezzo() {
		return prezzo;
	}

	@Override
	public String toString() {
		return "Articolo [quantita=" + quantita + ", prezzo=" + prezzo + ", codice=" + codice + "]";
	}

	public String getCodice() {
		return codice;
	}

	public void inc(){
		quantita++;
	}

	public int getQuantita() {
		return quantita;
	}
}

