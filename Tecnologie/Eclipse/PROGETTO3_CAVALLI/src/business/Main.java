package business;

public class Main {
	
	Condividi con = new Condividi();
	
	Cavallo c1= new Cavallo(con,5,0);
	Cavallo c2= new Cavallo(con,5,1);
	Cavallo c3= new Cavallo(con,3,2);
	Cavallo c4= new Cavallo(con,5,3);
	Cavallo c5= new Cavallo(con,5,4);
	
	int vincitore;

	public static void main(String[] args) {
		new Main();
	}
	
	public Main() {
		c1.start();
		c2.start();
		c3.start();
		c4.start();
		c5.start();

		while (fine()==false) {
			System.out.print(con.stampa());
			try {
				Thread.sleep(200);
			} catch (InterruptedException e) {
			}
			System.out.print("\n\n\n\n\n");
		}
		System.out.println("Il vincitore della gara è il cavallo " + vincitore);
	}
	
	public boolean fine() {
		boolean ret=false;
		if (c1.isFine()==true||c2.isFine()==true||c3.isFine()==true||c4.isFine()==true||c5.isFine()==true) {
			ret = true;
		}
		if(c1.isFine()==true) {
			vincitore=0;
		}if(c2.isFine()==true) {
			vincitore=1;
		}if(c3.isFine()==true) {
			vincitore=2;
		}if(c4.isFine()==true) {
			vincitore=3;
		}if(c5.isFine()==true) {
			vincitore=4;
		}
		return ret;
	}

}
