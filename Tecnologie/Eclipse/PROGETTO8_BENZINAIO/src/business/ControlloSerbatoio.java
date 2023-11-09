package business;

import util.Params;

public class ControlloSerbatoio extends Thread {
	Benzinaio benzinaio;

	public ControlloSerbatoio(Benzinaio b) {
		benzinaio = b;
	}

	public void run() {
		for (int i = 0; i < Params.timeSerbatoio; i++) {
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			benzinaio.secInMeno();
		}
		benzinaio.fineSerb();
	}
}
