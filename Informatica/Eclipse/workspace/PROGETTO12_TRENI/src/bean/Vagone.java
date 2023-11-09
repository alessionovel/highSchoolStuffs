package bean;

public class Vagone {
	int codice, anno;
	double tara;

	public Vagone() {
		codice=0;
		anno=0;
		tara=0;
	}


	public Vagone(int codice,double tara,int anno) {
		this.codice=codice;
		this.tara=tara;
		this.anno=anno;
	}
}
