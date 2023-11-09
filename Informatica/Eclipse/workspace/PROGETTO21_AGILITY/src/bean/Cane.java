package bean;

public abstract class Cane {
	String nomeCane, nomePadrone, razza;
	int num, anni, tempo, penalita, punteggio;
	double peso;
	
	public Cane(String c, String p, String r, int n, int a, double pes) {
		nomeCane=c;
		nomePadrone=p;
		razza=r;
		num=n;
		anni=a;
		peso=pes;
		tempo=0;
		penalita=0;
		punteggio=0;
	}
	
	public void setTempo(int tempo) {
		this.tempo = tempo;
	}

	public void setPenalita(int penalita) {
		this.penalita = penalita;
	}

	public String getNomePadrone() {
		return nomePadrone;
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
