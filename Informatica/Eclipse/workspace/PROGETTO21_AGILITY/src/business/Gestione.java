package business;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import bean.Cane;
import utility.ConfrontaNomeCane;
import utility.ConfrontaProgrGara;

public class Gestione {
	List <Cane> cani = new ArrayList<Cane>();
	
	void newCane(Cane cane) {
		cani.add(cane);
	}
	
	String elencoNome() {
		String ret="";
		ConfrontaNomeCane or1 = new ConfrontaNomeCane();
		Collections.sort(cani,or1);
		for(int i=0;i<cani.size();i++){
			ret=ret+"\n"+(i+1)+cani.get(i).toString();
		}
		return ret;
	}
	
	String elencoNum() {
		String ret="";
		ConfrontaProgrGara or2 = new ConfrontaProgrGara();
		Collections.sort(cani,or2);
		for(int i=0;i<cani.size();i++){
			ret=ret+"\n"+(i+1)+cani.get(i).toString();
		}
		return ret;
	}
	
	String chiamaCane(int n) {
		String ret="";
		ret="Nome: "+cani.get(n-1).getNomeCane()+ " Padrone: "+cani.get(n-1).getNomePadrone();
		return ret;
	}

	void datiCane(int i, int tempo, int penalita) {
		cani.get(i).setTempo(tempo);
		cani.get(i).setPenalita(penalita);
		cani.get(i).calcPuntFinale();
	}
}
