package business;

public class Mostra extends Thread{
	Condividi condividi;
	
	public Mostra(Condividi c) {
		condividi=c;
	}
	
	public void run() {
		while(true) {
			System.out.println(condividi.output());
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
