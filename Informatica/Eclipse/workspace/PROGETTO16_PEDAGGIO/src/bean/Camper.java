package bean;

public class Camper extends Veicolo{
	double lunghezza;

	public Camper(TipoVeicolo tipo, TipoCarb alimentazione, double serb, double cons, double lung,double carb) {
		super.tipo=tipo;
		super.alimentazione=alimentazione;
		super.serb=serb;
		super.cons=cons;
		lunghezza=lung;
		super.euro=3*lung;
		super.carb=carb;
	}
}
