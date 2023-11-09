#include <iostream>
#include <stdlib.h>
#include <string.h>
using namespace std;

int main (){
    int i,quantita[100],id[100],acquisto,idprodotto;
    string email;
    i=0;
    //Riempimento dei vettori per la produzione della tabella
    for(i=0;i<100;i++){
        id[i]=1+i;
        }
    for(i=0;i<100;i++){
        quantita[i]=1; //Il vettore "quantita" servirà in seguito per sostituire la quantità di partenza se il prodotto verrà acquistato
    }
    acquisto=12345;     //Viene assegnata una variabile casuale ad acquisto per far si che iul programma giri
    while(acquisto!=0){
    cout<<"Con quale nome vuoi effettura le spese?";    //Il calcolatore assegna a "email" la mail dell'acquirente
    cin>>email;
    cout<<"\t ID:\t quantita:\n";       //Qui si stampa una tabella contenente gli id e le quantita dei prodotti
    for(i=0;i<100;i++){
        cout<<"prodotto "<<id[i]<<"\t"<<id[i]<<"\t"<<quantita[i];
        cout<<"\n";}
    do{cout<<"Quanti prodotti vuole acquistare? Da 1 a 3?";     //Qui viene chiesto il numero di prodotti che l'utente desidera acquistare
        cin>>acquisto;}while(acquisto>3&&acquisto<1);
        if(acquisto!=0){
            for(i=0;i<acquisto;i++){
                cout<<"Quale prodotto vuoi acquistare?";    //Se l'acquisto è maggiore di 0 viene chiesto all'utente l'id dei prodotti da acquistare
                cin>>idprodotto;
                if(idprodotto!=0){
                    if(quantita[idprodotto]!=0){
                        quantita[idprodotto-1]=0;       //Inserimento della quantita dopo l'acquisto dell'utente
                        cout<<"L'acquisto e' andato a buon fine\n";}
                    else{
                        cout<<"\nL'acquisto non e' avvenuto\n";
                        for(i=0;i<100;i++){
                            cout<<"prodotto "<<id[i]<<"\t"<<id[i]<<"\t"<<quantita[i];
                            cout<<"\n";}
                    }}
                    cout<<"Grazie per il suo acquisto\n\n\n";
                    }
            for(i=0;i<100;i++){
            cout<<"prodotto "<<id[i]<<"\t"<<id[i]<<"\t"<<quantita[i];       //Nuova tabella con le rispettive quantitra dei prodotti
            cout<<"\n";}}
                    else{}}


system("PAUSE");
return 0;
}
