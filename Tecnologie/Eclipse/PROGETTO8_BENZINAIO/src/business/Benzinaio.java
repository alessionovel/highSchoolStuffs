package business;

import util.Params;

public class Benzinaio {
	Pompa[] pompe;
	int serbatoio;
	boolean libero;
	int nAutoB=10;

	public Benzinaio() {
		pompe = new Pompa[Params.nPompe];
		for (int i = 0; i < Params.nPompe; i++) {
			pompe[i] = new Pompa();
		}
		serbatoio = Params.capSerb;
		libero = true;
	}

	public void newAuto(int carb) {
		int n = findLibera();
		pompe[n].add(carb);
	}

	int findLibera() {
		int ret = 0, min = pompe[0].getCoda();
		for (int i = 0; i < Params.nPompe; i++) {
			if (min > pompe[i].getCoda()) {
				min = pompe[i].getCoda();
				ret = i;
			}
		}
		return ret;
	}

	public String mostra() {
		String ret = "";
		if (libero == false) {
			ret = ret + "AUTOBOTTE [" + nAutoB +"]\n";
		}
		for (int i = 0; i < Params.nPompe; i++) {
			ret = ret + (i + 1) + ". " + pompe[i].mostra() + "\n";
		}
		ret = ret + "Serbatoio: " + serbatoio;
		return ret;
	}

	public synchronized boolean stato() {
		if (libero == true) {
			if (serbatoio <= Params.ricarica) {
				libero = false;
				new ControlloSerbatoio(this).start();
				try {
					wait();
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		}else {
			try {
				wait();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		return libero;
	}

	public synchronized void fineSerb() {
		libero = true;
		serbatoio=1000;
		nAutoB=10;
		notifyAll();
	}

	public int benzina(int idPompa) {
		int litri;
		litri = pompe[idPompa].prossimo();
		if (litri != -1) {
			if(serbatoio<litri) {
				litri=-1;
			}
		}
		return litri;
	}

	public synchronized void fineBenzina(int idPompa, int litri) {
		if (serbatoio>litri) {
			pompe[idPompa].fineProx();
			serbatoio = serbatoio - litri;
		}
	}
	
	public void secInMeno() {
		nAutoB--;
	}
}
