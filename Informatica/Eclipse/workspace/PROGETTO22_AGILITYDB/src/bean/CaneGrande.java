package bean;

public class CaneGrande extends Cane {
	public CaneGrande(String c, String p, String r, int n, int a, double pes, String t) {
		super(c, p, r, n, a, pes, t);
	}

	public String calcPuntFinale() {
		String ret = "";
		punteggio = (int) (tempo + (0.05 * tempo) + (0.8 * penalita) * 1.8);
		ret = "Il punteggio finale è di " + punteggio;
		return ret;
	}
}
