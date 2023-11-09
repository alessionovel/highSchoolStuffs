package bean;

public class CaneMedio extends Cane{
	public CaneMedio(String c, String p, String r, int n, int a,double pes) {
		super(c, p, r, n, a, pes);
	}

	public String calcPuntFinale() {
		String ret="";
		punteggio=(int) (tempo+(penalita*1.7));
		ret="Il punteggio finale è di " + punteggio;
		return ret;
	}
}
