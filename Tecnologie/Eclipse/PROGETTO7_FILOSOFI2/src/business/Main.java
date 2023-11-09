package business;

public class Main {
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Condividi condividi = new Condividi();
		Mostra mostra = new Mostra(condividi);
		Produttore[] produttore = new Produttore[5];
		for (int i=0;i<5;i++) {
			produttore[i] = new Produttore(condividi, i);
		}
		mostra.start();
		for (int i=0;i<5;i++) {
			produttore[i].start();
		}

	}

}
