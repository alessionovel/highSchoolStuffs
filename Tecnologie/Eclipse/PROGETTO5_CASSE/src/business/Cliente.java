package business;

public class Cliente extends Thread {
	Supermercato sup;
	int tempo;
	int nArt;

	public Cliente(Supermercato s, int t, int n) {
		sup = s;
		tempo = t;
		nArt = n;
	}

	public void run() {
		while (true) {
			sup.add((int) ((Math.random() * nArt) + 1));
			try {
				Thread.sleep(tempo);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
