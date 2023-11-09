package business;

public class Main {
	public static void main(String[] args) throws InterruptedException {
		// Object of a class that has both produce()
		// and consume() methods
		Parcheggio park = new Parcheggio();

		Auto auto = new Auto(park);
		auto.start();
	}
}