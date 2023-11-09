package business;

public class Buttafuori extends Thread {
	private Fila fila;

	public Buttafuori(Fila f) {
		fila = f;
	}

	public void run() {
		while (true) {
			try {
				fila.controllo();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
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
