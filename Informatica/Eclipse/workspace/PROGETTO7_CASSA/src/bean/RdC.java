package bean;

public class RdC {
	private int nscont,i,tot;
	private boolean stato, log, scon;
	Articolo scontrino[];

	public RdC(){
		nscont=0;
		stato=false;
		log=false;
		scon=false;
		tot=0;
		i=0;
	}

	public boolean isLog() {
		return log;
	}

	public boolean isStato() {
		return stato;
	}

	public boolean isScon() {
		return scon;
	}

	public boolean accesospento(){
		if (stato==false){
			stato=true;
		}else{
			stato=false;
			scontrino=null;
			scon=false;
			log=false;
			nscont=0;
			tot=0;
			i=0;
		}
		return stato;
	}

	public void loginout(){
		if (stato==true){
			if (log==false){
				log=true;
				System.out.println("Hai effettuato il login");
			}else{
				log=false;
				System.out.println("Hai effettuato il logout");
			}
		}else{
			System.out.println("La cassa è spenta");
		}
	}

	public void iniziascontrino(){
		if (scon==false){
			scon=true;
			scontrino = new Articolo[10];
			i=0;
			System.out.println("Nuovo scontrino iniziato");
		}else{
			System.out.println("C'è un altro scontrino in corso");
		}
	}

	public void aggart(String codice, int prezzo){
		boolean x = false;
		for (int j=0;j<i;j++){
			if (codice.equals(scontrino[j].getCodice())){
				scontrino[j].inc();
				x=true;
			}
		}
		if (x==false){
			scontrino[i] = new Articolo(codice,prezzo);
			i++;
		}
	}

	public void delart(String codice){
		boolean x=false;
		int punto=0;
		for (int j=0;j<i;j++){
			if (codice.equals(scontrino[j].getCodice())){
				scontrino[j]=null;
				x=true;
				punto=j;
			}
		}
		if (x==true){
			for(int j=punto;j<i-1;j++){
				scontrino[j]=scontrino[j+1];
			}
			i--;
		}else{
			System.out.println("Non c'è nessun articolo con questo codice");
		}
	}

	public void mostrascon(){
		int totale=0;
		for (int j=0;j<i;j++){
			System.out.println(scontrino[j].toString());
			totale=totale+(scontrino[j].getPrezzo()*scontrino[j].getQuantita());
		}
		System.out.println("Prezzo totale= " + totale);
	}

	public void finescon(){
		int totale=0;
		for (int j=0;j<i;j++){
			System.out.println(scontrino[j].toString());
			totale=totale+(scontrino[j].getPrezzo()*scontrino[j].getQuantita());
		}
		System.out.println("Prezzo totale= " + totale);
		scon=false;
		scontrino=null;
		nscont++;
		tot = tot + totale;
	}

	public void tott(){
		System.out.println("L'incasso della giornata finora è di " + tot);
	}

	public void nscon(){
		System.out.println("Sono stati battuti " + nscont + " scontrini");
	}
}