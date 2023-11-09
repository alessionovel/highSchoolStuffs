package bean;

public class Veicolo {
	TipoVeicolo tipo;
	TipoCarb alimentazione;
	double serb, cons, euro,carb;

	public Veicolo() {
		tipo=null;
		alimentazione=null;
		serb=0;
		cons=0;
	}

	public String controllo() {
		String ret="";
		double nec=130/cons;
		if (nec>carb) {
			nec=nec-carb;
			ret="Devi aggiungere ancora " + nec+ " di carburante prima di partire";
		}
		ret=ret+"\nIl ticket ti costa "+ euro +" euro";
		return ret;
	}

	public double getEuro() {
		return euro;
	}
}
