package bean;

public enum TipoPanino {
	BIGMAC (4.50, "rosa"),
	MCCHICKEN(5.00, "ketchup"),
	MCBACON (5.20,"rosa"),
	BBQ (5.60, "maionese e senape"),
	COUNTRY(6.00, "piccante");
	private double prezzo;
	private String salsa;
	TipoPanino(double prezzo, String salsa){
		this.prezzo = prezzo;
		this.salsa = salsa; }
	public double getPrezzo() {
		return prezzo; }
	public String getSalsa() {
		return salsa; } 
}
