package bean;

public abstract class Cane {
	String nomeCane, nomePadrone, razza, taglia;
	int num, anni, tempo, penalita, punteggio;
	double peso;

	public Cane(String c, String p, String r, int n, int a, double pes, String t) {
		nomeCane = c;
		nomePadrone = p;
		razza = r;
		num = n;
		anni = a;
		peso = pes;
		taglia = t;
		tempo = 0;
		penalita = 0;
		punteggio = 0;
	}

	public void setTempo(int tempo) {
		this.tempo = tempo;
	}

	public String getRazza() {
		return razza;
	}

	public int getAnni() {
		return anni;
	}

	public int getTempo() {
		return tempo;
	}

	public int getPenalita() {
		return penalita;
	}

	public int getPunteggio() {
		return punteggio;
	}

	public double getPeso() {
		return peso;
	}

	public void setPenalita(int penalita) {
		this.penalita = penalita;
	}

	public String getNomePadrone() {
		return nomePadrone;
	}

	public String getTaglia() {
		return taglia;
	}

	@Override
	public String toString() {
		return "Cane [nomeCane=" + nomeCane + ", nomePadrone=" + nomePadrone + ", razza=" + razza + ", num=" + num
				+ ", anni=" + anni + ", peso=" + peso + "]";
	}

	public abstract String calcPuntFinale();

	public String getNomeCane() {
		return nomeCane;
	}

	public int getNum() {
		return num;
	}
}
