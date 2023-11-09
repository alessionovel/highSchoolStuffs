package business;

public class Cassa extends Thread {
	Supermercato sup;
	int free = 0;

	public Cassa(Supermercato s) {
		sup = s;
	}

	public void run() {
		int sec;
		while (true) {
			sec = sup.prossimo();
			free = sec;
			sec = sec * 1000;
			try {
				Thread.sleep(sec);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			free = 0;
		}
	}

	public int getFree() {
		return free;
	}
}
