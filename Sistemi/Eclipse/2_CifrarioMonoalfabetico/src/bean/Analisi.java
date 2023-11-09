package bean;

import java.util.ArrayList;
import java.util.Arrays;

public class Analisi {
	int[] presenze;
	ArrayList<Character> alfabeto, vetFrequenze;

	public Analisi() {
		alfabeto = new ArrayList<>();
		for (int i = 0; i < 26; i++)
			alfabeto.add((char) (65 + i));
		presenze = new int[26];
		for (int i = 0; i < presenze.length; i++)
			presenze[i] = 0;
		vetFrequenze = new ArrayList<Character>(Arrays.asList('e', 'i', 'a', 'o', 'n', 'r', 'l', 't', 's', 'd', 'c',
				'u', 'p', 'm', 'g', 'v', 'h', 'f', 'b', 'q', 'z', 'j', 'y', 'x', 'k', 'w'));
	}

	public String analisi(String testo) {
		String ret = "";
		char l;
		clear();
		testo = testo.toUpperCase();
		conta(testo);
		bubbleSort();
		ret += "\n\n Decriptazione probabile: ";
		for (int i = 0; i < testo.length(); i++) {
			l = testo.toCharArray()[i];
			ret += vetFrequenze.get(alfabeto.indexOf(l));
		}
		return ret;
	}

	public void conta(String testo) {
		int index;
		char lettera;
		for (int i = 0; i < testo.length(); i++) {
			lettera = testo.toUpperCase().toCharArray()[i];
			index = alfabeto.indexOf(lettera);
			presenze[index]++;
		}
	}

	public void bubbleSort() {
		int var, n = presenze.length;
		char l;
		for (int i = 0; i < n - 1; i++) {
			for (int j = 0; j < n - 1 - i; j++) {
				if (presenze[j + 1] > presenze[j]) {
					var = presenze[j];
					presenze[j] = presenze[j + 1];
					presenze[j + 1] = var;
					l = alfabeto.get(j);
					alfabeto.set(j, alfabeto.get(j + 1));
					alfabeto.set(j + 1, l);
				}
			}
		}
		System.out.println("\nEcco quante volte viene ripetuta ogni lettera");
		for (int i = 0; i < alfabeto.size(); i++)
			System.out.println(alfabeto.get(i) + " " + presenze[i]);
	}

	public void clear() {
		alfabeto = new ArrayList<>();
		for (int i = 0; i < 26; i++)
			alfabeto.add((char) (65 + i));
		presenze = new int[26];
		for (int i = 0; i < presenze.length; i++)
			presenze[i] = 0;
	}

}
