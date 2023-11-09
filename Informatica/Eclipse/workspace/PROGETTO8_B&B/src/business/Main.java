package business;

import java.util.Scanner;

import bean.Stanza;

public class Main {

	Scanner input;
	Stanza giorno1[] = new Stanza[5];
	Stanza giorno2[] = new Stanza[5];
	int numCliente=1;

	public static void main(String[] args) {
		new Main();
	}

	Main(){

		int scelta=0;
		input = new Scanner(System.in);

		giorno1[0]=new Stanza(1,100);
		giorno2[0]=new Stanza(1,100);

		giorno1[1]=new Stanza(2,101);
		giorno2[1]=new Stanza(2,101);

		giorno1[2]=new Stanza(3,200);
		giorno2[2]=new Stanza(3,200);

		giorno1[3]=new Stanza(3,202);
		giorno2[3]=new Stanza(3,202);

		giorno1[4]=new Stanza(2,203);
		giorno2[4]=new Stanza(2,203);


		do{
			scelta=menu();
			switch(scelta){
			case 1:
				nuova();
				break;
			case 2:
				del();
				break;
			case 3:
				mostra();
				break;
			case 4:
				stats();
				break;
			}
		}while(scelta!=5);
	}

	public int menu(){
		int scelta=0;
		do {
			System.out.println("1. Nuova prenotazione\n2. Disdici prenotazione\n3. Mostra stato stanze\n4. Statistica prenotazioni\n5. Esci\n\nScelta: ");
			scelta = Integer.parseInt(input.nextLine());
		}while (scelta<1 || scelta>5);
		return scelta;
	}

	public void nuova(){
		int giorno,letti,i=0;
		boolean x=false;
		do {
			System.out.println("Vuoi andare il 1 giugno o il 2 giugno? (1/2)");
			giorno = Integer.parseInt(input.nextLine());
		}while (giorno<1 || giorno>2);
		do {
			System.out.println("Quanti posti letto ti servono?");
			letti = Integer.parseInt(input.nextLine());
		}while (letti<1);
		if (giorno==1){
			for(i=0;i<5;i++){
				if ((giorno1[i].getLetti()>=letti) && (giorno1[i].getCliente()==0) && (x==false)){
					x=true;
					giorno1[i].setCliente(numCliente);
					System.out.println("Stanza prenotata: codice cliente= "+ numCliente);
					numCliente++;
				}
			}
		}else if (giorno==2){
			for(i=0;i<5;i++){
				if ((giorno2[i].getLetti()>=letti) && (giorno2[i].getCliente()==0) && (x==false)){
					x=true;
					giorno2[i].setCliente(numCliente);
					System.out.println("Stanza prenotata: codice cliente= "+ numCliente);
					numCliente++;
				}
			}
		}
		if (x==false) {
			System.out.println("Non è disponibile nessuna stanza con queste richieste!\n");
		}
	}

	public void del(){
		int cerca;
		boolean x=false;
		System.out.println("Inserisci il numero del cliente della stanza che vuoi eliminare: ");
		cerca = Integer.parseInt(input.nextLine());
		for(int i=0;i<5;i++){
			if (cerca==giorno1[i].getCliente()){
				x=true;
				giorno1[i].setCliente(0);
			}
		}
		for(int i=0;i<5;i++){
			if (cerca==giorno2[i].getCliente()){
				x=true;
				giorno2[i].setCliente(0);
			}
		}
		if (x==false) System.out.println("Cliente non trovato");
	}

	public void mostra(){
		System.out.println("\nGiorno 1\n");
		for(int i=0;i<5;i++){
			System.out.println(giorno1[i].toString());
		}
		System.out.println("\nGiorno 2\n");
		for(int i=0;i<5;i++){
			System.out.println(giorno2[i].toString());
		}
	}

	public void stats(){
		int vett[] = new int[5];
		int max=0;
		for(int i=0;i<5;i++){
			vett[i]=0;
		}
		for(int i=0;i<5;i++){
			if(giorno1[i].getCliente()!=0){
				vett[i]=vett[i]+1;
			}
			if(giorno2[i].getCliente()!=0){
				vett[i]=vett[i]+1;
			}
			if (i==0){
				max=vett[i];
			}else if (max<vett[i]){
				max=vett[i];
			}
		}
		System.out.println("La stanze più prenotate sono: ");
		for(int i=0;i<5;i++){
			if (max==vett[i]){
				System.out.println(giorno1[i].getNum());
			}
		}
	}
}