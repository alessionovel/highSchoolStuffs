package business;

import java.util.ArrayList;
import java.util.List;

import bean.Bevanda;
import bean.Ordine;
import bean.Snack;

public class Gestione {
	List <Ordine> ordini = new ArrayList<Ordine>();
	int n=0;
	
	void nuovoOrdine(int nTav) {
		ordini.add(new Ordine(nTav));
	}
	
	void addSnack(Snack snack) {
		ordini.get(n).addSnack(snack);
	}
	
	void addBev(Bevanda bev) {
		ordini.get(n).addBev(bev);
	}
	
	void fineOrdine() {
		n++;
	}
	
	String proxBev(){
		String ret="";
		if (n>0){
			ret="\nTavolo: "+ ordini.get(0).getNTav()+ordini.get(0).proxBev();
		}else{
			ret="Non ci sono altri ordini in coda";
		}
		return ret;
	}
	
	String proxSnack(){
		String ret="";
		if (n>0){
			ret="\nTavolo: "+ ordini.get(0).getNTav()+ordini.get(0).proxSnack();
		}else{
			ret="Non ci sono altri ordini in coda";
		}
		return ret;
	}
	
	String consegna() {
		String ret="";
		if ((ordini.get(0).isProxSnack()==true) && (ordini.get(0).isProxBev()==true)) {
			ret="Portare al tavolo numero " + ordini.get(0).getNTav() + "\n" + ordini.get(0).proxBev() + ordini.get(0).proxSnack() + "\nScontrino: " + ordini.get(0).getConto() + "€";
			ordini.remove(0);
			n--;
		}else {
			ret="Bisogna prima far preparare il vassoio";
		}
		return ret;
	}
}
