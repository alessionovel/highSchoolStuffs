package business;

import java.util.Scanner;

import bean.Cartolina;

public class Main {

	private static Scanner input;

	public static void main(String[] args) {

		input = new Scanner(System.in);
		Cartolina cartoline[] = new Cartolina[100];
		String mitt, dest, luog;
		int scelta,n=0;

		do {
			scelta=menu();
			if (scelta==1) {
				if (n>100){
					System.out.println("Non hai piu' spazio per altre cartoline!");
				}else {
					System.out.println("Inserire il nome del mittente");
					mitt = input.nextLine();
					System.out.println("Inserire il nome del destinatario");
					dest = input.nextLine();
					System.out.println("Inserire la località da cui la cartolina e' stata inviata: ");
					luog = input.nextLine();
					cartoline[n] = new Cartolina(mitt,dest,luog);
					n++;
				}
			}else if (scelta==2) {
				String cerca;
				int num=0;
				System.out.println("Inserire il nome del mittente che si vuole cercare");
				cerca = input.nextLine();
				for (int i=0; i<n; i++){
					if (cerca.equals(cartoline[i].getMittente())){
						System.out.println("\n" + num+1 + ". " + cartoline[i].getMittente() + " ha inviato una cartolina a " + cartoline[i].getDestinazione() + " dalla citta' di " + cartoline[i].getLuogo() + "\n");
						num++;
					}
				}
				if (num==0) System.out.println(cerca +" non ha inviato nessuna cartolina");
			}else if (scelta==3) {
				String cerca;
				int num=0;
				System.out.println("Inserire il nome del destinatario che si vuole cercare");
				cerca = input.nextLine();
				for (int i=0; i<n; i++){
					if (cerca.equals(cartoline[i].getDestinazione())){
						System.out.println("\n" + num+1 + ". " + cartoline[i].getDestinazione() + " ha ricevuto una cartolina da " + cartoline[i].getMittente() + " dalla citta' di " + cartoline[i].getLuogo() + "\n");
						num++;
					}
				}
				if (num==0) System.out.println(cerca +" non ha inviato nessuna cartolina");
			}else if (scelta==4) {
				String cerca;
				int num=0;
				System.out.println("Inserire il nome del luogo che si vuole cercare");
				cerca = input.nextLine();
				for (int i=0; i<n; i++){
					if (cerca.equals(cartoline[i].getLuogo())){
						System.out.println("\n" + num+1 + ". Dalla città di " + cartoline[i].getLuogo() + " è stata inviata una cartolina da " + cartoline[i].getMittente() + " a " + cartoline[i].getDestinazione() + "\n");
						num++;
					}
				}
				if (num==0) System.out.println(cerca +" non ha inviato nessuna cartolina");
			}
		}while (scelta!=5);
	}

	public static int menu() {
		int scelta;
		System.out.println("1. Aggiungi una cartolina\n2. Cerca per mittente\n3. Cerca per destinatario\n4. Cerca per località\n5. Esci\n\n");
		scelta = Integer.parseInt(input.nextLine());
		return scelta;
	}
}
