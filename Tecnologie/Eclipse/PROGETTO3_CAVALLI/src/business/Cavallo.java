package business;

import java.util.Random;

public class Cavallo extends Thread{
	private Condividi con;
	private Random r = new Random();
	private int daFare, lung, nCavallo, fatte;
	private boolean fine = false;

	public Cavallo(Condividi con, int lung, int nCav) {
		this.con=con;
		this.lung=lung;
		this.nCavallo=nCav;
		daFare=0;
		fatte=0;
	}
	
	public void run() {
		while(fine==false) {
			for (int i = 0; i < 100; i++) {
				daFare = r.nextInt(lung) + 1;
				if ((fatte + daFare) < 100) {
					con.muovi(nCavallo, daFare);
					fatte += daFare;
					try {
						Thread.sleep(200);
					} catch (InterruptedException e) {
					}
				} else {
					fine=true;
				}
			}
		}
	}

	public boolean isFine() {
		return fine;
	}
}
