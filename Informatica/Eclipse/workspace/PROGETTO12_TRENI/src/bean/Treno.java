package bean;

public class Treno {
	double pesoMax;
	String cittaP, cittaA;
	int oraP, oraA;
	Vagone vagoni[]= new Vagone[10];
	int cont;

	public Treno(){
		pesoMax=0;
		cittaP=null;
		cittaA=null;
		oraP=0;
		oraA=0;
		cont=0;
	}

	public Treno(double pesoMax, String cittaP, String cittaA,int oraP, int oraA){
		this.pesoMax=pesoMax;
		this.cittaP=cittaP;
		this.cittaA=cittaA;
		this.oraP=oraP;
		this.oraA=oraA;
		cont=0;
	}

	public int getCont() {
		return cont;
	}

	public void newVagone(Vagone vagone) {
		vagoni[cont]=vagone;
		cont++;
	}
}
