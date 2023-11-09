package multithreading1;

public class MainClass {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		MyThread th1 = new MyThread(1);
		th1.start();
		MyThread th2 = new MyThread(2);
		th2.start();
		MyThread th3 = new MyThread(3);
		th3.start();
		MyThread th4 = new MyThread(4);
		th4.start();
		MyThread th5 = new MyThread(5);
		th5.start();
		MyThread th6 = new MyThread(6);
		th6.start();
		MyThread th7 = new MyThread(7);
		th7.start();
		MyThread th8 = new MyThread(8);
		th8.start();

	
		/*NoThread thn1 = new NoThread(1);
		thn1.run();
		NoThread thn2 = new NoThread(2);
		thn2.run();*/
		
		
	}

}
