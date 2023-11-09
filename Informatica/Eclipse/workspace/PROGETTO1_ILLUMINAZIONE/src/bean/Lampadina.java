package bean;

public class Lampadina {
	private int stato, potenza, contaClick, vita;

	public Lampadina() {
		stato 		= 0;
		potenza 	= 40;
		contaClick 	= 0;
		vita		= 10;
	}

	public Lampadina(int pot) {
		stato 		= 0;
		potenza 	= pot;
		contaClick 	= 0;
		vita		= 10;
	}

	public Lampadina(int pot, int vita) {
		stato 		= 0;
		potenza 	= pot;
		contaClick 	= 0;
		this.vita	= vita;
	}

	public void click(){
		contaClick++;
		switch (stato) {
		case 0:
			if (contaClick < vita) {
				stato = 1;
			} else {
				stato = 2;
			}
			break;
		case 1:
			if (contaClick < vita) {
				stato = 0;
			} else {
				stato = 2;
			}
			break;
		case 2:

			break;
		}
	}

	public String toString() {
		return "Lampadina [stato=" + stato + ", potenza=" + potenza + ", contaClick=" + contaClick + ", vita=" + vita
				+ "]";
	}

	public int getStato() {
		return stato;
	}
}
