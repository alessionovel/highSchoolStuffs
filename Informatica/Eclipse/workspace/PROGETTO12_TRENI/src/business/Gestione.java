package business;

import bean.Treno;
import bean.Vagone;



public class Gestione {
	Treno treni[]=new Treno[10];
	int cont;
	public Gestione() {
		cont=0;
	}

	public void aggTreno(double pesomax, String cittaP, String cittaA,int oraP, int oraA) {
		if (cont<10) {
			treni[cont]=new Treno(pesomax, cittaP, cittaA, oraP, oraA);
			cont++;
		}
	}

	public boolean newVag(Vagone vagone, int nt) {
		boolean bool=false;
		if (treni[nt]!=null && treni[nt].getCont()<10) {
			treni[nt].newVagone(vagone);
			bool=true;
		}
		return bool;
	}

	public void eliminaVagone(int codice,int cont) {

	}


}
