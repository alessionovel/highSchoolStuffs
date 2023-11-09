package business;

public class Produttore extends Thread {
	Condividi condividi;
	int id;

	public Produttore(Condividi c, int n) {
		condividi = c;
		id = n;
	}

	public void run() {
		while (true) {
			condividi.prendiF(id);
			try {
				Thread.sleep(((int) (Math.random() * 20) + 1) * 1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
