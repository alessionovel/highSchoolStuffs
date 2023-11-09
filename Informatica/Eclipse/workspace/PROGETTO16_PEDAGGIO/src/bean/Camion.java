package bean;

public class Camion extends Veicolo{
	double peso;

	public Camion(TipoVeicolo tipo, TipoCarb alimentazione, double serb, double cons, double pes,double carb) {
		super.tipo=tipo;
		super.alimentazione=alimentazione;
		super.serb=serb;
		super.cons=cons;
		peso=pes;
		super.euro=5*pes;
		super.carb=carb;
	}
}
