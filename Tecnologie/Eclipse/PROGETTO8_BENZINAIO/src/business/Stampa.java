package business;

public class Stampa extends Thread{
	Benzinaio benzinaio;
	
	public Stampa (Benzinaio b) {
		benzinaio = b;
	}
	
	public void run() {
		while (true) {
			System.out.println("\n\n\n\n\n\n\n\n\n" + benzinaio.mostra());
			try {
				Thread.sleep(100);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
}
