package bean;

public class Concorrente {
	String nome, cognome, numT, bibita, cibo;
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
			ret="Il concorrente ci ha messo "+ t +" minuti";
		}else {
			ret="Il concorrente era già arrivato";
		}
		return ret;
	}

	public String getBibita() {
		return bibita;
	}

	public String getCibo() {
		return cibo;
	}
}