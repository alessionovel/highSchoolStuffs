package bean;

public class Veicolo {
	int consumo;
	String tipoCarb;
	double quSerb, capacita;

	public Veicolo(){
		consumo=23;
		tipoCarb="benzina";
		capacita=43;
		quSerb=0;
	}

	public Veicolo(String tc){
		consumo=24;
		tipoCarb=tc;
		capacita=45;
		quSerb=0;
	}

	public Veicolo(String tc, double serb, int con){
		consumo=con;
		tipoCarb=tc;
		capacita=serb;
		quSerb=0;
	}

	public String guida(double km){
		String ret="";
		double litri=0;
		litri=km / consumo;
		if (litri<quSerb) {
			quSerb=quSerb - litri;
		} else {
			ret="Per fare cosi tanti km mancano " + (litri - quSerb) + " litri";
		}
		return ret;
	}

	public double getLivello(){
		return quSerb;
	}

	public String addCarb(double lit){
		String ret="";
		if (lit < (capacita - quSerb)){
			quSerb = quSerb + lit;
		} else {
			ret = "Puoi inserire al massimo " + (capacita - quSerb) + " litri";
		}
		return ret;
	}

	public double faiPieno() {
		double qua= capacita - quSerb;
		quSerb = quSerb + qua;
		return qua;
	}

	public double daiPieno() {
		double qua= capacita - quSerb;
		return qua;
	}

	public boolean isDiesel(){
		boolean ret = false;
		if (tipoCarb.equals("gasolio")) {
			ret = true;
		}
		return ret;
	}
}