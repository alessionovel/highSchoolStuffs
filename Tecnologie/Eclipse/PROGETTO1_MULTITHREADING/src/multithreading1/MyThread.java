package multithreading1;

public class MyThread extends Thread {
	
	int tag;
	
	MyThread(int t) {
		tag = t;
	}

	public void run() {
		for(int i=0;i<20;i++) {
			System.out.print(String.valueOf(i) + " " + tag + " ");
		}
		System.out.println();
	}
}
