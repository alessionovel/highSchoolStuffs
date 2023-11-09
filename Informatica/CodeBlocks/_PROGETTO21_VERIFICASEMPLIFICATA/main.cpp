#include <iostream>
#include <stdlib.h>
#include <string.h>

using namespace std;

int main (){
    int i,n,quantita[100],id[100],acquisto,idprodotto,persone;

    i=0;

    //Riempimento dei vettori per la produzione della tabella
    for(i=0;i<100;i++)
	    {
        id[i]=1+i;
        }

	for(i=0;i<100;i++)
	    {
        quantita[i]=1; //Il vettore "quantita" servirà in seguito per sostituire la quantità di partenza se il prodotto verrà acquistato
        }

	cout<<"Quante persone devono eseguire un acquisto?"; //viene chiesto quante volte verrà eseguito un acquisto
    cin>>persone;
    acquisto=0;
    string email[persone]; // si dichiara un vettore che memorizzerà tutte le mail che hanno eseguito un ordine
    while(acquisto<persone)
	    {
	    n=0;
    	cout<<"Con quale email vuoi effettura le spese?";    //Il calcolatore assegna in una casella del vettore email la mail dell'acquirente
		cin>>email[acquisto];
		cout<<"\t\t ID:\t quantita:\n";       //Qui si stampa una tabella contenente gli id e le quantita dei prodotti
		for(i=0;i<100;i++)
		    {
		    cout<<"prodotto "<<id[i]<<"\t"<<id[i]<<"\t"<<quantita[i];
            cout<<"\n";
		    }
        while(n<3)
		    {
            cout<<"Quale prodotto vuoi acquistare?";    //si chiede l' id del prodotto da acquistare
            cin>>idprodotto;

            if(quantita[idprodotto-1]!=0)
		        { //se il prodotto è disponibile avviene l' acquisto
                quantita[idprodotto-1]=quantita[idprodotto-1]-1;
                cout<<"L'acquisto e' andato a buon fine\nGrazie per il suo acquisto\n";
			    }
            else // altrimenti si invia un messaggio di errore e si mostra i prodotti disponibili
		        {
                cout<<"\nIl prodotto non e' piu' disponibile\nEcco i prodotti ancora disponibili\n";
                cout<<"\t\t ID:\t quantita:\n";
                for(i=0;i<3;i++)
			        {
                    cout<<"prodotto "<<id[i]<<"\t"<<id[i]<<"\t"<<quantita[i];
                    cout<<"\n";
			        }
                }
            n++;
            }
        acquisto++;
        }

    cout<<"\nAlla fine degli acquisti sono rimasti i seguenti prodotti:\n\n"; //Nuova tabella con le rispettive quantitra dei prodotti
    cout<<"\t\t ID:\t quantita:\n";
    for(i=0;i<100;i++)
	    {
        cout<<"prodotto "<<id[i]<<"\t"<<id[i]<<"\t"<<quantita[i];
        cout<<"\n";
		}
    cout<<"Le seguenti mail hanno interagito col programma oggi:\n";// elenchiamo le mail che hanno acquistato qualcosa
		for(i=0;i<persone;i++)
	    {
		cout<<"\n- "<<email[i]<<"\n";
        }


system("PAUSE");
return 0;
}
