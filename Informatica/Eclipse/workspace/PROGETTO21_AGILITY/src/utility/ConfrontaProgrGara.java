package utility;

import java.util.Comparator;

import bean.Cane;

public class ConfrontaProgrGara implements Comparator<Cane>{

	@Override
	public int compare(Cane o1, Cane o2) {
		int ret=0;
		if(o1.getNum()<o2.getNum()) {
			ret=-1;
		}else {
			ret=1;
		}
		return ret;
	}

}
