package business;

public class Conta extends Thread {
	int nCas;
	Cassa[] cassa;
	int[] free;
	boolean fine = true;

	public Conta(int nCas, Cassa[] casse) {
		this.nCas = nCas;
		cassa = casse;
		free = new int[nCas];
	}

	public void run() {
		while (fine) {
			for (int i = 0; i < nCas; i++) {
				if (cassa[i].getFree() == 0) {
					free[i]++;
				}
			}
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

	public void setFine(boolean fine) {
		this.fine = fine;
	}

}
