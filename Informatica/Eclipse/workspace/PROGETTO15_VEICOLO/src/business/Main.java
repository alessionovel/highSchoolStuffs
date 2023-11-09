package business;

import java.util.Scanner;

import bean.Veicolo;

public class Main {
	Scanner leggi = new Scanner(System.in);

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new Main();
	}

	Main(){
		Veicolo auto = null;
		int scelta=0, cons;
		double capa;
		String lett;

		do{
			System.out.println("Scegli il tipo di veicolo che vuoi testare");
			System.out.println("1. Veicolo base (Capacità=43l, Consumo=23; Benzina)");
			System.out.println("2. Scegli carburante (Capacità=45l, Consumo=24)");
			System.out.println("3. Scegli carburante, capacità e consumo");
			scelta = Integer.parseInt(leggi.nextLine());
			if ((scelta > 3 ) && (scelta < 1)){
				System.out.println("Scelta non prevista");
			}
		} while ((scelta > 4 ) && (scelta < 1));
		switch (scelta) {
		case 1:
			auto = new Veicolo();
			break;
		case 2:
			do{
				System.out.println("Digita il tipo di carburante:");
				System.out.println("1. Benzina");
				System.out.println("2. Gasolio");
				lett = leggi.nextLine();
				if (!lett.equalsIgnoreCase("1") && !lett.equalsIgnoreCase("2")){
					System.out.println("Scelta non prevista");	
				}
			} while (!lett.equalsIgnoreCase("1") && !lett.equalsIgnoreCase("2"));
			if (lett.equalsIgnoreCase("1")){ auto = new Veicolo("benzina");}
			if (lett.equalsIgnoreCase("2")){ auto = new Veicolo("gasolio");}
			break;
		case 3:
			do{
				System.out.println("Digita il tipo di carburante:");
				System.out.println("1. benzina");
				System.out.println("2. gasolio");
				lett = leggi.nextLine();
				if (!lett.equalsIgnoreCase("1") && !lett.equalsIgnoreCase("2")){
					System.out.println("scelta non prevista");
				}
			} while (!lett.equalsIgnoreCase("1") && !lett.equalsIgnoreCase("2"));
			if (lett.equalsIgnoreCase("1")){
				lett = "benzina";
			}
			if (lett.equalsIgnoreCase("2")){
				lett="gasolio";
			}
			System.out.println("Inserisci la capacità del serbatoio:");
			capa = Double.parseDouble(leggi.nextLine());
			System.out.println("Inserisci il consumo del veicolo:");
			cons = Integer.parseInt(leggi.nextLine());
			auto = new Veicolo(lett,capa,cons);
			break;
		}
		int cosa=0;
		String ret;
		do {
			System.out.println("1. Guidare per un percorso");
			System.out.println("2. Aggiungi benzina");
			System.out.println("3. Fare il pieno");
			System.out.println("4. Chiedere livello carburante");
			System.out.println("5. Chiedere tipo carburante");
			System.out.println("6. Esci");
			cosa = Integer.parseInt(leggi.nextLine());
			if (cosa<1 || cosa>6){
				System.out.println("Scelta non prevista");
			}
			if (cosa==1){
				System.out.println("Quanti km si vogliono fare?");
				double km = Double.parseDouble(leggi.nextLine());
				ret = auto.guida(km);
				if (ret.equals("")){
					System.out.println("Rimangono "+ auto.getLivello() + " litri");;
				} else	{
					System.out.println(ret);
				}
			}
			if (cosa==2){
				System.out.println("Quanti litri vuoi aggiungere?");
				double lit = Double.parseDouble(leggi.nextLine());
				ret = auto.addCarb(lit);
				if (ret.equals("")){
					System.out.println("Ora hai "+ auto.getLivello() + " litri");
				} else	{
					System.out.println(ret);
				}
			}
			if (cosa==3){
				System.out.println("Sono stati aggiunti " + auto.faiPieno() + " litri di carburante");
			}
			if (cosa==4){
				System.out.println("Hai " + auto.getLivello() + " litri di carburante");
			}
			if (cosa==5){
				if (auto.isDiesel()){
					System.out.println("La macchina va a gasolio");
				} else	{
					System.out.println("La macchina va a benzina");
				}
			}
		} while (cosa!=6);
	}
}