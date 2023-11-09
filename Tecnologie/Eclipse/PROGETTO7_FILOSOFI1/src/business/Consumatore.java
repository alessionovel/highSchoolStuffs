package business;

public class Consumatore extends Thread{
	Condividi condividi;
	int id;
	
	public Consumatore(Condividi c, int n) {
		condividi=c;
		id=n;
	}
	
	public void run() {
		try {
			Thread.sleep(((int) (Math.random() * 20) + 1)*1000);
		} catch (InterruptedException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		condividi.lasciaF(id);
	}

}
