package business;

public class Gestione {
	Dao dao;

	public Gestione() {
		dao = new Dao();
	}

	int getNum() {
		return dao.getNum();
	}

	void addSnack(String nome, double prezzo, int nOrd) {
		dao.addSnack(nome, prezzo, nOrd);
	}

	void addBev(int nOrd, String nome, int stuz, double prezzo) {
		dao.addBev(nOrd,nome,stuz,prezzo);
	}

	void fineOrdine(int nOrd, int nTav, double conto) {
		dao.fineOrdine(nOrd,nTav,conto);
	}
	
	String prepOrd() {
		return dao.prepOrd();
	}

	public String consegnaVassoio(int nOrd) {
		return dao.consegnaVassoio(nOrd);
	}
	
	public double conto(int nTav) {
		return dao.conto(nTav);
	}
	
	public void pagaConto(int nTav) {
		dao.pagaConto(nTav);
	}
	
	public void chiusura() {
		dao.chiusura();
	}
}
