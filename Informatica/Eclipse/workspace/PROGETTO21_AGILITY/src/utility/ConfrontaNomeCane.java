package utility;

import java.util.Comparator;

import bean.Cane;

public class ConfrontaNomeCane implements Comparator<Cane>{

	@Override
	public int compare(Cane o1, Cane o2) {
		int ret=o1.getNomeCane().compareToIgnoreCase(o2.getNomeCane());
		return ret;
	}

}
