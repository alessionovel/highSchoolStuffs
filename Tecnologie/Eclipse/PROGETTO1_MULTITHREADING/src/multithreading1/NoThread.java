package multithreading1;

public class NoThread {
	
	int tag;
	
	NoThread(int t) {
		tag = t;
	}
	
	public void run() {
		for(int i=0;i<20;i++) {
			System.out.print(String.valueOf(i) + " " + tag + " ");
		}
		System.out.println();
	}
}
