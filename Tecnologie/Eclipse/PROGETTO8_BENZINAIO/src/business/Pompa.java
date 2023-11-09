package business;

import java.util.ArrayList;

public class Pompa {
	boolean libera = true;
	ArrayList<Integer> coda = new ArrayList<Integer>();
	
	public int getCoda() {
		return coda.size();
	}
	
	public synchronized void add(int carb) {
		coda.add(carb);
		notifyAll();
	}
	
	public synchronized int prossimo() {
	int ret=-1;
		if(!coda.isEmpty()) {
			libera=false;
			ret=coda.get(0);
		}else {
			try {
				wait();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		return ret;
	}
	
	public void fineProx() {
		libera=true;
		coda.remove(0);
	}

	public String mostra() {
		String ret="";
		for(int i=0 ; i<coda.size();i++) {
			ret = ret + coda.get(i) + " ";
		}
		return ret;
	}

}
