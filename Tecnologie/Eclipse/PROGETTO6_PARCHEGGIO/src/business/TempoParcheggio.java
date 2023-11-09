package business;

import java.lang.Math;

public class TempoParcheggio extends Thread {
	int id;
	Parcheggio park;
	int t = (int) (Math.random() * 10) + 1;
	int i = 0;

	public TempoParcheggio(int i, Parcheggio p) {
		id = i;
		park = p;
	}

	public void run() {
		try {
			Thread.sleep(t*1000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		park.fine(id, t);
	}
}
