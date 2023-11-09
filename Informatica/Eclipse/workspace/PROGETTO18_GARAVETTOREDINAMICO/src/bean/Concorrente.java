package bean;

public class Concorrente implements Comparable<Concorrente> {
	String nome, cognome, numT, bibita, cibo;

	public void setBibita(String bibita) {
		this.bibita = bibita;
	}

	int pett;
	int tempo;

	public Concorrente(String n, String c, String nT, String b, String cb, int p) {
		nome=n;
		cognome=c;
		numT=nT;
		bibita=b;
		cibo=cb;
		pett=p;
		tempo=0;
	}

	public String arrivo(int t) {
		String ret="";
		if (tempo==0) {
			tempo=t;
			ret="Il concorrente ci ha messo "+ tempo +" minuti";
		}else {
			ret="Il concorrente era già arrivato";
		}
		return ret;
	}

	public int getTempo() {
		return tempo;
	}

	public String getBibita() {
		return bibita;
	}

	public String getCibo() {
		return cibo;
	}

	public int getPett() {
		return pett;
	}

	public String getNome() {
		return nome;
	}

	public int compareTo(Concorrente o) {
		int ret=0;
		if ( o.tempo < this.tempo){
			ret = 1;
		}else {
			ret = -1;
		}
		return ret;
	}

	public String toString() {
		return "Concorrente [nome=" + nome + ", cognome=" + cognome + ", numT=" + numT + ", pett=" + pett + ", tempo="
				+ tempo + "]";
	}
}