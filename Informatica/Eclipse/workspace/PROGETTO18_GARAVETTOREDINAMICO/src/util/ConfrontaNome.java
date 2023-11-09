package util;

import java.util.Comparator;

import bean.Concorrente;

public class ConfrontaNome implements Comparator<Concorrente> {

	public int compare(Concorrente o1, Concorrente o2) {
		int ret=0;
		ret=o1.getNome().compareToIgnoreCase(o2.getNome());
		return ret;
	}
}
