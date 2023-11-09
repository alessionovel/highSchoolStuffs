package business;

public class Mostra extends Thread {
	Supermercato sup;
	Cassa[] cassa;
	int nCas;

	public Mostra(Supermercato supermercato, Cassa[] casse, int n) {
		sup = supermercato;
		cassa = casse;
		nCas = n;
	}

	public void run() {
		while (true) {
			System.out.println("\n\n\n" + sup.getVett());
			for (int i = 0; i < nCas; i++) {
				System.out.println("\nCassa " + (i + 1) + ": " + cassa[i].getFree());
			}
			try {
				Thread.sleep(500);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
