package bean;

public class Moto extends Veicolo{
	int cc;

	public Moto(TipoVeicolo tipo, TipoCarb alimentazione, double serb, double cons, int cilindrata,double carb) {
		super.tipo=tipo;
		super.alimentazione=alimentazione;
		super.serb=serb;
		super.cons=cons;
		cc=cilindrata;
		super.euro=7;
		super.carb=carb;
	}
}
