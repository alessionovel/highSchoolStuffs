package business;

import java.util.ArrayList;
import java.util.List;

public class Parcheggio {

	// Create a list shared by producer and consumer
	// Size of list is 2.
	List<Integer> parcheggiato = new ArrayList<>();
	List<Integer> vett = new ArrayList<>();
	int capacity = 3;

	// Function called by producer thread
	public void generaAuto(int id) {
		if (parcheggiato.size() == capacity) {
			Attesa attesa = new Attesa(id, this);
			vett.add(id);
			attesa.start();
			System.out.println("Auto " + id + " in attesa");
		} else {
			TempoParcheggio t = new TempoParcheggio(id, this);
			t.start();
			parcheggiato.add(id);
			System.out.println("Auto " + id + " parcheggiata. Posti liberi = " + (3 - parcheggiato.size()));
		}
	}

	public synchronized boolean controlla(int id) {
		boolean ret = false;
		if (vett.get(0) == id) {
			if (parcheggiato.size() == capacity) {
				ret = false;
			} else {
				TempoParcheggio t = new TempoParcheggio(id, this);
				t.start();
				parcheggiato.add(id);
				System.out.println("Auto " + id + " parcheggiata. Posti liberi = " + (3 - parcheggiato.size()));
				ret = true;
			}
		}
		return ret;
	}

	public synchronized void fine(int id, int t) {
		int n = 0;
		for (int i = 0; i < parcheggiato.size(); i++) {
			if (parcheggiato.get(i) == id) {
				n = i;
			}
		}
		System.out.println("Auto " + parcheggiato.get(n) + " uscita dopo " + t + " secondi. Posti liberi = "
				+ (4 - parcheggiato.size()));
		parcheggiato.remove(n);
		notify();
	}

	public void togli(int id, boolean fine, int t) {
		int n = 0;
		for (int i = 0; i < vett.size(); i++) {
			if (id == vett.get(i)) {
				n = i;
			}
		}
		vett.remove(n);
		if (fine == false) {
			System.out.println("Auto " + id + " è stufa di aspettare e dopo " + t + "secondi se ne è andata");
		}
	}
}
