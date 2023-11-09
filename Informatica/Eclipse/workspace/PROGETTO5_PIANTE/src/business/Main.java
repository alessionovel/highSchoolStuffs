package business;

import java.util.Scanner;
import bean.Pianta;

public class Main {

	Scanner input;
	int n=0, maxPiante=100, codice, scelta, pos;
	Pianta piante[] = new Pianta[maxPiante];
	String specie, famiglia, taglia;
	boolean pM=true;
	double prezzo, prezzoMin;

	public static void main(String[] args) {
		new Main();
	}
	public Main(){
		input = new Scanner(System.in);
		trattaMenu();
	}
	public void trattaMenu(){
		do {
			scelta=menu();
			switch (scelta) {
			case 1:
				aggiungi();
				break;
			case 2:
				cerca();
				break;
			case 3:
				vendi();
				break;
			case 4:
				elenco1();
				break;
			case 5:
				elenco2();
				break;
			}
		}while (scelta!=6);
	}

	public int menu(){
		int scelta;
		System.out.println("1. Aggiungi una pianta\n2. Cerca per specie\n3. Vendere una pianta\n4. Elenco pianta tra 10 e 15€\n5. Elenco piante più economiche\n6. Esci\n\n");
		scelta = Integer.parseInt(input.nextLine());
		return scelta;
	}

	public void aggiungi(){
		if (n>maxPiante){
			System.out.println("Non hai piu' spazio per altre piante!");
		}else {
			System.out.println("Inserire la specie della pianta");
			specie = input.nextLine();
			System.out.println("Inserire la famiglia della pianta");
			famiglia = input.nextLine();
			System.out.println("Inserire la taglia della pianta");
			taglia = input.nextLine();
			System.out.println("Inserire il codice della pianta");
			codice = Integer.parseInt(input.nextLine());
			System.out.println("Inserire il prezzo della pianta");
			prezzo = Double.parseDouble(input.nextLine());
			if (pM==true){
				prezzoMin=prezzo;
				pM=false;
			}else{
				if (prezzoMin>prezzo){
					prezzoMin=prezzo;
				}
			}
			do {
				System.out.println("Inserire la posizione della pianta");
				pos = Integer.parseInt(input.nextLine());
			}while(pos<100 && pos>0 && piante[pos]!=null);
			piante[pos] = new Pianta(specie,famiglia,taglia,codice,prezzo);
			n++;
		}
	}

	public void cerca(){
		String cerca;
		boolean x=false;
		System.out.println("Inserire la specie da cercare");
		cerca = input.nextLine();
		for (int i=0;i<maxPiante;i++){
			if (piante[i]!=null){
				if (cerca.equals(piante[i].getSpecie())) {
					System.out.println(piante[i].toString());
					x=true;
				}
			}
		}
		if (x==false)System.out.println("Non è stata trovata nessuna pianta di questa specie");

	}

	public void vendi(){
		int cerca;
		boolean x=false;
		System.out.println("Inserire il codice da cercare");
		cerca = Integer.parseInt(input.nextLine());
		for (int i=0;i<maxPiante;i++){
			if (piante[i]!=null){
				if (cerca==piante[i].getCodice()) {
					System.out.println("La pianta costa " + piante[i].getPrezzo() + "€");
					piante[i]=null;
					x=true;
				}
			}
		}
		if (x==false)System.out.println("Non è stata trovata nessuna pianta con questo codice");
	}

	public void elenco1(){
		boolean x=false;
		for (int i=0;i<maxPiante;i++){
			if (piante[i]!=null){
				if (piante[i].getPrezzo()<15 && piante[i].getPrezzo()>10){
					System.out.println(piante[i].toString());
					x=true;
				}
			}
		}
		if (x==false)System.out.println("Non c'è nessuna pianta tra i 10 e i 15 euro");
	}

	public void elenco2(){
		for (int i=0;i<maxPiante;i++){
			if (piante[i]!=null){
				if(prezzoMin==piante[i].getPrezzo()){
					System.out.println(piante[i].toString());
				}
			}
		}
	}
}