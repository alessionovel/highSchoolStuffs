package bean;

public class Under extends Concorrente{
	int mese, anno;

	public Under(String n, String c, String nT, String b, String cb, int p, int m, int a) {
		super(n, c, nT, b, cb, p);
		mese=m;
		anno=a;
	}
}