package bean;


public class Studente {
	String cognome, nome, classe;
	TipoPanino p;

	public Studente(String n, String c, String cl, TipoPanino tp){
		cognome = c;
		nome = n;
		classe = cl;
		p = tp;
	}

	public String getCognome() {
		return cognome;
	}

	public String getNome() {
		return nome;
	}

	public String getClasse() {
		return classe;
	}

	public String toString() {
		return "cognome=" + cognome + ", nome=" + nome + ", classe=" + classe + ", p=" + p;
	}

}