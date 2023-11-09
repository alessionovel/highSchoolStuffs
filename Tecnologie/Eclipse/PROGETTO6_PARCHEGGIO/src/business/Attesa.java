package business;

import java.lang.Math;

public class Attesa extends Thread {
	int id;
	Parcheggio park;
	int t = (int) (Math.random() * 20) + 1;
	int i = 0;
	boolean fine = false;

	public Attesa(int i, Parcheggio p) {
		id = i;
		park = p;
	}

	public void run() {
		while (i < t && fine == false) {
			if (park.controlla(id)) {
				fine = true;
			} else {
				try {
					Thread.sleep(1000);
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
			i++;
		}
		park.togli(id, fine, t);
	}
}
