package business;

public class Main {

	Fila fila = new Fila(0);
	Cliente c = new Cliente(fila);
	Buttafuori b = new Buttafuori(fila);

	public static void main(String[] args) {
		new Main();

	}

	Main() {
		c.start();
		b.start();
	}

}
