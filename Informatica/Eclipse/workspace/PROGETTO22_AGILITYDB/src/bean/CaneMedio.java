package bean;

public class CaneMedio extends Cane {
	public CaneMedio(String c, String p, String r, int n, int a, double pes, String t) {
		super(c, p, r, n, a, pes, t);
	}

	public String calcPuntFinale() {
		String ret = "";
		punteggio = (int) (tempo + (penalita * 1.7));
		ret = "Il punteggio finale è di " + punteggio;
		return ret;
	}
}
