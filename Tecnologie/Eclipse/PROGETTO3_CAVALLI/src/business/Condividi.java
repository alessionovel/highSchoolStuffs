package business;

public class Condividi {
	char matr[][]= new char[5][100];
	int cav[]=new int[] {0,1,2,3,4};

	public Condividi() {
		for(int x = 0; x<5;x++)
			for(int y = 0; y<100; y++) {
				matr[x][y] =' ';
				if(y == 0) {
					matr[x][y] = (char)(x+'0');
				}
			}
	}
	
	public String stampa() {
		String ret = "",linea = "";
		for (int i=0;i<100;i++)
			linea += "_";

		ret+=linea+"\n"; 
		for (int x=0;x<5;++x) {
			for(int y=0; y<100; ++y)
				ret+=matr[x][y];
			ret+="\n"+linea+"\n";
		}
		return ret;
	}
	
	public void muovi(int cav,int sposta) {
		int lastPos = pos(cav);
		this.matr[cav][lastPos] = ' ';
		this.matr[cav][lastPos+sposta] = (char)(cav+'0');
	}
	
	private int pos(int riga) {
		int pos = 0;

		for(int y = 0; y< 100; ++y) {
			if(matr[riga][y]!=(' ')) {
				pos = y;
				break;
			}
		}
		return pos;
	}
}
