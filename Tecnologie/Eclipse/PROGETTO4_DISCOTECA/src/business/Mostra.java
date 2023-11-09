package business;

public class Mostra {

	public void stampa(int vett[],int but) {
		for (int y = 0; y < 9; y++) {
			System.out.print("\n" + vett[y]);
			if (but == y) {
				System.out.print(" -B");
			}
		}
		System.out.println("\n\n\n\n");
	}
}
