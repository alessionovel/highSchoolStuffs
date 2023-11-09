package business;

public class Main {

	public static void main(String[] args) {

		Condividi i = new Condividi();

		Madre th1 = new Madre(1,i);
		th1.start();
		Madre th2 = new Madre(2,i);
		th2.start();
	}

}
