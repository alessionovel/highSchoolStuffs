package bean;

public class Stanza {
	int num, letti, cliente;

	public Stanza(int letti,int num){
		this.letti = letti;
		this.num = num;
		cliente=0;
	}

	@Override
	public String toString() {
		return "Stanza [num=" + num + ", letti=" + letti + ", cliente=" + cliente + "]";
	}

	public void setCliente(int cliente) {
		this.cliente = cliente;
	}

	public int getNum() {
		return num;
	}

	public int getLetti() {
		return letti;
	}

	public int getCliente() {
		return cliente;
	}
}