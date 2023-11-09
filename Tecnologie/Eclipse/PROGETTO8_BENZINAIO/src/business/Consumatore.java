package business;

import util.Params;

public class Consumatore extends Thread {
	public int idPompa;
	Benzinaio benzinaio;

	public Consumatore(Benzinaio b, int id) {
		idPompa = id;
		benzinaio = b;
	}

	public void run() {
		while (true) {
			if (benzinaio.stato()) {
				int litri = benzinaio.benzina(idPompa);
				if (litri != -1) {
					try {
						Thread.sleep(litri * Params.timeBenzina);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					benzinaio.fineBenzina(idPompa,litri);
				}
			}
		}
	}
}
