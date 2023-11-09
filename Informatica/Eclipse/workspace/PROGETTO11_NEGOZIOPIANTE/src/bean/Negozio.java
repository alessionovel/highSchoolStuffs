package bean;

public class Negozio {
	double euro;
	int nScaf;
	Scaffale scaffali[];
	public Negozio(){
		euro=0;
	}

	public Negozio(int nscaf) {
		euro=30;
		scaffali = new Scaffale[nscaf];
		this.nScaf=nscaf;
	}

	public void setScaffale(int numero, int np) {
		scaffali[numero] = new Scaffale(np);
	}

	public boolean addPianta(Pianta pianta, int scaffale, int pos) {
		boolean bool=true;
		if (scaffale>=0 && scaffale<=nScaf) {
			if ((euro-pianta.getPrezzo())>0) {
				double prezzo;
				prezzo=pianta.getPrezzo();
				pianta.setPrezzo(pianta.getPrezzo()+(pianta.getPrezzo()/100*10));
				bool=scaffali[scaffale].addPianta(pianta, pos);
				if (bool==true) {
					euro=euro-prezzo;
				}
			}	
		}else bool=false;
		return bool;
	}

	public double getEuro() {
		return euro;
	}

	public String cerca(double prezzo) {
		String stringa="Lista Piante\n";
		for (int i=0;i<nScaf;i++) {
			stringa=stringa +(i+1)+" scaffale:\n"+ (scaffali[i].cerca(prezzo));
		}
		return stringa;
	}

	public String cerca2(String specie) {
		String stringa="Lista Piante\n";
		for (int i=0;i<nScaf;i++) {
			stringa=stringa +(i+1)+" scaffale:\n"+ (scaffali[i].cerca2(specie));
		}
		return stringa;
	}

	public boolean vendi(int codice) {
		boolean bool=false;
		double prezzo=0;
		for (int i=0;i<nScaf;i++) {
			prezzo=scaffali[i].vendi(codice);
			if (prezzo!=-1){
				bool=true;
				euro=euro+prezzo;
			}
		}
		return bool;
	}
}
