package business;

import java.util.ArrayList;
import java.util.List;

public class Supermercato {
	List<Integer> vett = new ArrayList<Integer>();
	int nCas;

	public Supermercato(int nCas) {
		this.nCas = nCas;
	}

	public synchronized int prossimo() {
		int ret = 0;
		if (vett.isEmpty() == false) {
			notify();
			ret = vett.get(0);
			vett.remove(0);
		} else {
			try {
				wait();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		return ret;
	}

	public List<Integer> getVett() {
		return vett;
	}

	public synchronized void add(int n) {
		if (vett.size() < 20) {
			vett.add(n);
			notifyAll();
		} else {
			try {
				wait();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
}
