package bean;

public class CanePiccolo extends Cane {
	public CanePiccolo(String c, String p, String r, int n, int a, double pes, String t) {
		super(c, p, r, n, a, pes, t);
	}

	public String calcPuntFinale() {
		String ret = "";
		if (razza.toLowerCase().equals("pincher")) {
			punteggio = (int) ((tempo - (0.25 * tempo)) + penalita - (0.35 * peso));
		} else {
			punteggio = (int) ((tempo - (0.15 * tempo)) + (penalita * 1.5));
		}
		ret = "Il punteggio finale è di " + punteggio;
		return ret;
	}
}
