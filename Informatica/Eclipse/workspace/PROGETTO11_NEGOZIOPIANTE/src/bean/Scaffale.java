package bean;

public class Scaffale {
	int nPos;
	Pianta piante[];
	public Scaffale() {
		nPos=0;
	}

	public Scaffale(int np) {
		nPos=np;
		piante= new Pianta[np];
	}

	public boolean addPianta(Pianta pianta,  int pos){
		boolean bool=true;
		if((pos<nPos) && (pos>0)) {
			if (piante[pos]==null) {
				piante[pos]= pianta;
			}else bool=false;
		}else bool=false;
		return bool;
	}

	public String cerca(double prezzo) {
		String stringa="";
		for (int i=0;i<nPos;i++) {
			if ((piante[i])!=null) {
				if (piante[i].getPrezzo()<=(prezzo)) {
					stringa=stringa+(piante[i].toString());
				}
			}
		}
		return stringa;
	}

	public String cerca2(String specie) {
		String stringa="";
		for (int i=0;i<nPos;i++) {
			if ((piante[i])!=null) {
				if (piante[i].getSpecie().equals(specie)) {
					stringa=stringa+(piante[i].toString());
				}
			}
		}
		return stringa;
	}

	public double vendi(int codice) {
		double prezzo=-1;
		for (int i=0;i<nPos;i++) {
			if ((piante[i])!=null) {
				if (piante[i].getCodice()==codice) {
					prezzo=piante[i].getPrezzo();
					piante[i]=null;
				}
			}
		}
		return prezzo;
	}
}
