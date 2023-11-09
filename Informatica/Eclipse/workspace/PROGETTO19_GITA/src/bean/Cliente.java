package bean;

public class Cliente implements Comparable<Cliente> {
	String nome,cognome,telefono,indirizzo,eta;

	public Cliente() {
		nome="";
		cognome="";
		telefono="";
		indirizzo="";
		eta="";
	}

	public Cliente(String n, String c, String t, String i, String e) {
		nome=n;
		cognome=c;
		telefono=t;
		indirizzo=i;
		eta=e;
	}

	public boolean confronto(String n, String c, String t) {
		boolean ret=false;
		String no=nome;
		String co=cognome;
		String te=telefono;
		if(no.toUpperCase().equals(n.toUpperCase()) && c.toUpperCase().equals(co.toUpperCase()) && t.toUpperCase().equals(te.toUpperCase())) {
			ret=true;
		}
		return ret;
	}

	public String getNome() {
		return nome;
	}

	public String getCognome() {
		return cognome;
	}

	@Override
	public String toString() {
		return "\nCliente [nome=" + nome + ", cognome=" + cognome + ", telefono=" + telefono + ", indirizzo=" + indirizzo
				+ ", eta=" + eta + "]";
	}

	public String getTelefono() {
		return telefono;
	}

	public String getIndirizzo() {
		return indirizzo;
	}

	public String getEta() {
		return eta;
	}

	public int compareTo(Cliente c) {
		int ret=0;
		ret=this.cognome.compareToIgnoreCase(c.cognome);
		return ret;
	}
}
