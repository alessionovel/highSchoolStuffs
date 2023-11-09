package business;

import bean.Concorrente;
import bean.Under;

public class Gestione {
	boolean inizioGara=false;
	int max=100, n=0;
	Concorrente part[] = new Concorrente[max];

	public String aggU(String nome, String cognome, String numero, String cibo, String bibita, int mese, int anno) {
		String ret="";
		part[n]=new Under(nome,cognome,numero,bibita,cibo,(n+1),mese,anno);
		n++;
		ret="Il tuo numero di pettorina è " + n;
		return ret;
	}

	public String agg(String nome, String cognome, String numero, String cibo, String bibita) {
		String ret="";
		part[n]=new Concorrente(nome,cognome,numero,bibita,cibo,(n+1));
		n++;
		ret="Il tuo numero di pettorina è " + n;
		return ret;
	}

	public String inizio() {
		String ret="";
		if (inizioGara==false) {
			if (n>1) {
				inizioGara=true;
				ret="Gara iniziata";
			}else {
				ret="Non ci sono abbastanza concorrenti";
			}
		}else {
			ret="Gara già iniziata";
		}
		return ret;
	}

	public String arrivo(int num, int orario, int minuto) {
		String ret="";
		int ora;
		num=num-1;
		ora=((orario-9)*60)+minuto-30;
		if (part[num] instanceof Under) {
			ora=ora-3;
		}
		if (num>=n) {
			ret="Numero pettorina non assegnato a nessuno";
		}else {
			ret=part[num].arrivo(ora);
		}
		return ret;
	}

	public String elenco() {
		String ret="";
		int veg=0, car=0, ham=0, piz=0, bir=0, vin=0, coc=0, ara=0, acq=0, bib=0;
		for(int i=0;i<n;i++) {
			if (part[i].getBibita().equals("Aranciata")) {
				ara++;
			}else if (part[i].getBibita().equals("Coca Cola")) {
				coc++;
			}else if (part[i].getBibita().equals("Acqua")) {
				acq++;
			}else if (part[i].getBibita().equals("Vino")) {
				vin++;
			}else if (part[i].getBibita().equals("Birra")) {
				bir++;
			}else if (part[i].getBibita().equals("Bibita Analcolica")) {
				bib++;
			}
			if (part[i].getCibo().equals("Pasto vegetariano")) {
				veg++;
			}else if (part[i].getCibo().equals("A base di carne")) {
				car++;
			}else if (part[i].getCibo().equals("Panino di hamburger e patatine")) {
				ham++;
			}else if (part[i].getCibo().equals("Pizza margherita")) {
				piz++;
			}
		}
		ret="\nPasti vegetariani=" + veg + "\nPasti a base di carne=" + car +"\nPanini di hamburger=" + ham + "\nPizze=" + piz +"\n\nAranciate=" + ara + "\nCoca Cole=" + coc + "\nAcque=" + acq + "\nVini=" + vin + "\nBirre=" + bir + "\nBibite analcoliche=" + bib;
		return ret;
	}

	public String pasto(int num) {
		String ret="";
		if (num>=n) {
			ret="Numero concorrente non assegnato a questo numero";
		}else {
			ret="Cibo: " + part[num].getCibo() + "\nBibita: " + part[num].getBibita();
		}
		return ret;
	}
}
