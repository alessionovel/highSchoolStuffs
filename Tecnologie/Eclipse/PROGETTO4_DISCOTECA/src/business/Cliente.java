package business;

public class Cliente extends Thread {
	private Fila fila;

	public Cliente(Fila f) {
		fila = f;
	}

	public void run() {
		while (true) {
			try {
				fila.nuovo();
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
