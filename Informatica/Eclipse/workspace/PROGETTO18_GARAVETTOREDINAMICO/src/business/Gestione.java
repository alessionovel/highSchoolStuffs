package business;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import bean.Concorrente;
import bean.Under;
import util.ConfrontaNome;
import util.ConfrontaPett;

public class Gestione {
	boolean inizioGara=false;
	int n=0,g=0;
	List <Concorrente> part = new ArrayList<Concorrente>();

	public String aggU(String nome, String cognome, String numero, String cibo, String bibita, int mese, int anno) {
		String ret="";
		part.add(new Under(nome,cognome,numero,bibita,cibo,(n+1),mese,anno));
		n++;
		ret="Il tuo numero di pettorina è " + n;
		return ret;
	}

	public String agg(String nome, String cognome, String numero, String cibo, String bibita) {
		String ret="";
		part.add(new Concorrente(nome,cognome,numero,bibita,cibo,(n+1)));
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
				g=n;
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
		if (g==0){
			ret="Sono arrivati tutti i concorrenti";
		}else{
			int ora;
			num=num-1;
			ora=((orario-9)*60)+minuto-30;
			if (num>=n) {
				ret="Numero pettorina non assegnato a nessuno";
			}else {
				if (part.get(num) instanceof Under) {
					ora=ora-3;
				}
				ret=part.get(num).arrivo(ora);
				if (ret.equals("Il concorrente era già arrivato")) {

				}else {
					g--;
				}
			}
		}
		return ret;
	}

	public String elenco() {
		String ret="";
		int veg=0, car=0, ham=0, piz=0, bir=0, vin=0, coc=0, ara=0, acq=0, bib=0;
		for(int i=0;i<n;i++) {
			if (part.get(i).getBibita().equals("Aranciata")) {
				ara++;
			}else if (part.get(i).getBibita().equals("Coca Cola")) {
				coc++;
			}else if (part.get(i).getBibita().equals("Acqua")) {
				acq++;
			}else if (part.get(i).getBibita().equals("Vino")) {
				vin++;
			}else if (part.get(i).getBibita().equals("Birra")) {
				bir++;
			}else if (part.get(i).getBibita().equals("Bibita Analcolica")) {
				bib++;
			}
			if (part.get(i).getCibo().equals("Pasto vegetariano")) {
				veg++;
			}else if (part.get(i).getCibo().equals("A base di carne")) {
				car++;
			}else if (part.get(i).getCibo().equals("Panino di hamburger e patatine")) {
				ham++;
			}else if (part.get(i).getCibo().equals("Pizza margherita")) {
				piz++;
			}
		}
		ret="\nPasti vegetariani=" + veg + "\nPasti a base di carne=" + car +"\nPanini di hamburger=" + ham + "\nPizze=" + piz +"\n\nAranciate=" + ara + "\nCoca Cole=" + coc + "\nAcque=" + acq + "\nVini=" + vin + "\nBirre=" + bir + "\nBibite analcoliche=" + bib;
		return ret;
	}

	public String pasto(int num) {
		String ret="";
		ConfrontaPett or1 = new ConfrontaPett();
		Collections.sort(part,or1);
		if (num>=n) {
			ret="Numero concorrente non assegnato a questo numero";
		}else if(part.get(num).getTempo()==0){
			ret="Il concorrente non è ancora arrivato";
		}else {
			ret="Cibo: " + part.get(num).getCibo() + "\nBibita: " + part.get(num).getBibita();
		}
		return ret;
	}

	public boolean controllaClassifica(){
		boolean ret=true;
		if (g!=0){
			ret=false;
		}
		return ret;
	}

	public String ordina(){
		String ret="";
		Collections.sort(part);
		for(int i=0;i<n;i++){
			ret=ret+"\n"+(i+1)+part.get(i).toString();
		}
		return ret;
	}

	public String ordinaNome(){
		String ret="";
		ConfrontaNome or1 = new ConfrontaNome();
		Collections.sort(part,or1);
		for(int i=0;i<n;i++){
			ret=ret+"\n"+(i+1)+part.get(i).toString();
		}
		return ret;
	}
	
	public String ordinaPett(){
		String ret="";
		ConfrontaPett or1 = new ConfrontaPett();
		Collections.sort(part,or1);
		for(int i=0;i<n;i++){
			ret=ret+"\n"+(i+1)+part.get(i).toString();
		}
		return ret;
	}
}
