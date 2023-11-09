package bean;

public class Valuta {
	String tipo;
	double cambio,imp;

	public Valuta() {
		tipo=null;
		imp=0;
		cambio=0;
	}

	public Valuta(String tipo, double imp, double cambio) {
		this.tipo=tipo;
		this.imp=imp;
		this.cambio=cambio;
	}

	public double getImp() {
		return imp;
	}

	public void setImp(double imp) {
		this.imp = imp;
	}

	public String getTipo() {
		return tipo;
	}

	public double getCambio() {
		return cambio;
	}

	@Override
	public String toString() {
		return "Valuta [tipo=" + tipo + ", imp=" + imp + ", cambio=" + cambio + "]";
	}
}
