package bean;

import java.util.ArrayList;
import java.util.List;

public class Ordine {
	int NTav;
	List <Bevanda> bibite = new ArrayList<Bevanda>();
	List <Snack> cibo = new ArrayList<Snack>();
	double conto;
	boolean proxBev=false,proxSnack=false;
	
	public Ordine(int n) {
		NTav=n;
		conto=0;
	}
	
	public void addSnack(Snack snack) {
		cibo.add(snack);
		conto=conto+snack.getPrezzo();
	}
	
	public void addBev(Bevanda bev) {
		bibite.add(bev);
		conto=conto+bev.getPrezzo();
	}
	
	public String proxBev(){
		String ret="\nBevande: ";
		for(int i=0;i<bibite.size();i++){
			ret=ret+"\n"+(i+1)+". "+bibite.get(i).toString();
		}
		if(bibite.size()==0){
			ret=ret+"\nL'ordine corrente non ha bevande";
		}
		proxBev=true;
		return ret;
	}
	
	public String proxSnack(){
		String ret="\nSnack: ";
		for(int i=0;i<cibo.size();i++){
			ret=ret+"\n"+(i+1)+". "+cibo.get(i).toString();
		}
		if(cibo.size()==0){
			ret=ret+"\nL'ordine corrente non ha snack";
		}
		proxSnack=true;
		return ret;
	}

	public double getConto() {
		return conto;
	}

	public int getNTav() {
		return NTav;
	}

	public boolean isProxBev() {
		return proxBev;
	}

	public boolean isProxSnack() {
		return proxSnack;
	}
	
}
