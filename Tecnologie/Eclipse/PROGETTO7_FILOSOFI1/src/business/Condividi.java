package business;

public class Condividi {
	int forchette[] = new int[5];

	public Condividi() {
		for (int i = 0; i < 5; i++) {
			forchette[i] = -1;
		}
	}

	public synchronized void prendiF(int n) {
		if (forchette[n] == -1 || forchette[n] == n) {
			forchette[n] = n;
			if (n == 4) {
				if (forchette[0] == -1) {
					forchette[0] = n;
					Consumatore c = new Consumatore(this,n);
					c.start();
				}
			} else if (forchette[n + 1] == -1) {
				forchette[n + 1] = n;
				Consumatore c = new Consumatore(this,n);
				c.start();
			}
			try {
				wait();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		} else {
			try {
				wait();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

	public synchronized void lasciaF(int n) {
		forchette[n] = -1;
		if (n == 4) {
			forchette[0] = -1;
		} else {
			forchette[n + 1] = -1;
		}
		notifyAll();
	}

	public String output() {
		String ret = "";
		for (int i = 0; i < 5; i++) {
			ret = ret + forchette[i] + " ";
		}
		return ret;
	}

}
