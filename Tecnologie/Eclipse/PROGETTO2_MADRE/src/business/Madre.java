package business;

public class Madre extends Thread{

	int tag;
	Condividi var;

	public Madre(int t, Condividi i) {
		tag = t;
		var = i;
	}

	public void run() {
		while(var.leggi()<=100) {
			System.out.print(String.valueOf(var.leggi()) + " " + tag + " ");
			var.scrivi();
		}
		System.out.println();
	}
}
