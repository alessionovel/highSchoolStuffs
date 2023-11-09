package business;


public class Gestione {
	public double cambio1(double euro,double coeff) {
		double quan;
		quan= (euro/coeff);
		quan=arrotondaRint(quan,2);
		return quan;
	}
	public double cambio2(double quan,double coeff) {
		double euro;
		euro=(quan*coeff);
		euro=arrotondaRint(euro,2);
		return euro;
	}
	public double arrotondaRint(double value, int numCifreDecimali) {
		double temp = Math.pow(10, numCifreDecimali);
		return Math.rint(value * temp) / temp;
	}
}