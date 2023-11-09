package business;

import java.util.Random;

import util.Params;

public class Produttore extends Thread{
	int nAuto;
	Random random;
	Benzinaio benzinaio;
	
	public Produttore(Benzinaio b) {
		nAuto = Params.nAuto;
		random = new Random();
		benzinaio = b;
	}
	
	public void run() {
		while (nAuto!=0) {
			int carb = random.nextInt(Params.maxL-Params.minL) + Params.minL;
			benzinaio.newAuto(carb);
			nAuto--;
			try {
				Thread.sleep(Params.timeAuto);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
}
