package business;

import bean.Ordine;
import bean.Studente;

public class Gestione {
	int n=10, i=0;
	Ordine ordini[] = new Ordine[n];

	public Gestione() {

	}

	public String nuovoOrdine(Ordine ordine){
		String ret="";
		if (i<n) {
			ordini[i]=ordine;
			i++;
			ret="ordine accettato";
		}else ret="numero massimo ordini raggiunto";
		return ret;
	}

	public String addStudente(Studente stud) {
		String ret="";
		ret=ordini[i-1].addStudente(stud);
		return ret;
	}

	public String delStudente(String no, String co, String cl) {
		String ret="";
		ret=ordini[i-1].delStudente(no,co,cl);
		return ret;
	}

	public String stampa() {
		String ret="";
		for (int i=0;i<this.i;i++) {
			ret=ret +"\n\n"+(i+1)+ ordini[i].stampa();
		}
		return ret;
	}

	public String delOrdine(int num) {
		String ret="ordine non trovato";
		if (num>(i-1) || num<0) {
			ret="Numero ordine non valido";
		}else {
			ordini[num]=null;
			scroll(num);
			ret="ordine eliminato";
			i--;
		}
		return ret;
	}

	public void scroll(int j) {
		for (int i=j;i<i-1;i++) {
			ordini[j]=ordini[j+1];
		}
		ordini[i-1]=null;
	}
}
