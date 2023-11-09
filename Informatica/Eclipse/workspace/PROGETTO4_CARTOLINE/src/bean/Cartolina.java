package bean;

public class Cartolina {
	private String mittente, destinazione, luogo;

	public Cartolina() {
		mittente 		= "0";
		destinazione 	= "0";
		luogo 			= "0";
	}

	public Cartolina(String mitt,String dest,String luog) {
		mittente = mitt;
		destinazione = dest;
		luogo = luog;
	}

	public String getMittente() {
		return mittente;
	}

	public String getDestinazione() {
		return destinazione;
	}

	public String getLuogo() {
		return luogo;
	}
}