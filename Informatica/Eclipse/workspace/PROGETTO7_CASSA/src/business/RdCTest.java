package business;

import java.util.Scanner;

import bean.RdC;

public class RdCTest {

	Scanner input;

	public static void main(String[] args) {
		new RdCTest();
	}

	public RdCTest(){
		input = new Scanner(System.in);
		int scelta;
		RdC cassa = new RdC();

		do{
			System.out.println("1. Acceso-Spento\n2. Login-Logout\n3. Inizia Scontrino\n4. Inserisci Articolo\n5. Cancella Articolo\n6. Mostra Scontrino\n7. Stampa Scontrino e Azzera\n8. Mostra totale incasso della giornata\n9. Mostra numero degli scontrini battuti\n10. Mostra i primi tre articoli più venduti\n11. Chiudi programma\n\n");
			scelta = Integer.parseInt(input.nextLine());

			if (scelta==1){
				if(cassa.accesospento()==true){
					System.out.println("Cassa accesa");
				}else{
					System.out.println("Cassa spenta");
				}
			}else if (scelta==2){
				cassa.loginout();
			}else if (cassa.isStato()==false){
				System.out.println("La cassa è spenta");
			}else if (cassa.isLog()==false){
				System.out.println("Bisogna effettuare il login");
			}else if (scelta==3 || scelta== 4 || scelta==5 || scelta==6 || scelta==7){
				if (scelta==3){
					cassa.iniziascontrino();
				}else if(cassa.isScon()==false){
					System.out.println("Inizia prima un nuovo scontrino");
				}else{
					if(scelta==4){
						String codice;
						int prezzo;
						System.out.println("Inserisci il codice del prodotto");
						codice = input.nextLine();
						System.out.println("Inserisci il prezzo del prodotto");
						prezzo = Integer.parseInt(input.nextLine());
						cassa.aggart(codice, prezzo);
					}else if (scelta==5){
						String codice;
						System.out.println("Inserisci il codice del prodotto che si vuole eliminare");
						codice = input.nextLine();
						cassa.delart(codice);
					}else if (scelta==6){
						cassa.mostrascon();
					}else if (scelta==7){
						cassa.finescon();
					}
				}
			}else if (scelta==8){
				cassa.tott();
			}else if (scelta==9){
				cassa.nscon();
			}else if (scelta==10){

			}
		}while (scelta!=11);
	}
}