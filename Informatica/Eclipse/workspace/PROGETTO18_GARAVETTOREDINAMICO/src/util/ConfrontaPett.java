package util;

import java.util.Comparator;

import bean.Concorrente;

public class ConfrontaPett implements Comparator<Concorrente>{
	public int compare(Concorrente o1, Concorrente o2) {
		int ret=0;
		if ( o1.getPett() < o2.getPett()){
			ret = -1;
		}else {
			ret = 1;
		}
		return ret;
	}
}
