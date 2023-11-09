package business;

public class Auto extends Thread {
	Parcheggio park;
	int id = 1;
	int maxAuto = 10;

	public Auto(Parcheggio p) {
		park = p;
	}

	public void run() {
		while (id <= maxAuto) {
			park.generaAuto(id);
			try {
				Thread.sleep(5000);//le auto arrivano ogni 5 secondi
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			id++;
		}
	}
}
