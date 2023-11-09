package bean;

public class Ordine {
	String scuola, data, ora;
	int is=0, numS=10;
	Studente[] consegna = new Studente[numS];

	public Ordine(String sc, String d, String o) {
		scuola=sc;
		data=d;
		ora=o;
	}

	public String addStudente(Studente s){
		String ret="";
		if (is < numS){
			consegna[is] = s;
			is++;
			ret = "ordine inserito";
		} else{
			ret = "raggiunto il numero massimo di ordini per questa scuola";
		}
		return ret; 
	}

	public String delStudente(String nome, String cognome, String classe) {
		String ret="ordine non trovato";
		for (int j=0;j<is;j++) {
			if (nome.equals( consegna[j].getNome()) && cognome.equals(consegna[j].getCognome()) && classe.equals(consegna[j].getClasse())) {
				consegna[j]=null;
				scroll(j);
				ret="ordine eliminato";
				is--;
			}
		}
		return ret;
	}

	public void scroll(int j) {
		for (int i=j;i<is-1;i++) {
			consegna[j]=consegna[j+1];
		}
		consegna[is-1]=null;
	}

	public String stampa() {
		String ret="";
		ret=". Scuola: " + scuola + "\n";
		for (int i=0;i<is;i++) {
			ret= ret + "\nStudente " + (i+1) +": " + consegna[i].toString();
		}
		return ret;
	}
}
