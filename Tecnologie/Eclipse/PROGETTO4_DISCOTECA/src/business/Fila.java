package business;

public class Fila {
	Mostra mostra = new Mostra();
	private int vett[] = new int[9];
	int cl = 0, but = 0;

	public Fila(int i) {
		for (int y = 0; y < 9; y++) {
			vett[y] = i;
		}
	}

	public synchronized void nuovo() throws InterruptedException {
		if (vett[cl] == 0) {
			vett[cl] = 1;
			mostra.stampa(vett, but);
			notify();
			if (cl == 8) {
				cl = 0;
			} else {
				cl++;
			}
		} else {
			wait();
		}
	}

	public synchronized void controllo() throws InterruptedException {
		if (vett[0] == 0 && but == 0) {
			wait();
		}
		if (vett[but] != 0) {
			vett[but] = 0;
			mostra.stampa(vett, but);
			notify();
		}
		if (but == 8) {
			but = 0;
		} else {
			but++;
		}
	}

}
