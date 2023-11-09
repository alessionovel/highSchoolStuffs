#include <cstdlib>

#include <iostream>

#include <cstdlib>

#include<stdio.h>

using namespace std;

int main(){

    int oraprenotata,oreprenotate,i;

    string nomeprenotazione,prenotazioni[8];

    cout<<"\nIl campo e' disponibile dalle 10:00 alle 17:00, e puoi prenotarlo per massimo due ore; ecco la tabella degli orari: \n";

    cout<<"10:00\t11:00\t12:00\t13:00\t14:00\t15:00\t16:00\t17:00\n";

    cout<<"1 ora\t2 ora\t3 ora\t4 ora\t5 ora\t6 ora\t7 ora\t8 ora\n";

               for(i=0;i<8;i++){

            prenotazioni[i]="libero";

    }

    while(nomeprenotazione!="fine"){

                cout<<"\nCon quale nome desideri prenotare il campo? ";

    cin>>nomeprenotazione;

                cout<<"10:00\t11:00\t12:00\t13:00\t14:00\t15:00\t16:00\t17:00\n";

    cout<<"1 ora\t2 ora\t3 ora\t4 ora\t5 ora\t6 ora\t7 ora\t8 ora\n";

                for(i=0;i<8;i++){

        cout<<prenotazioni[i]<<"\t";

    }

        cout<<"\nInsirsci a che ora vuoi prenotare il campo: ";

        cin>>oraprenotata;

        cout<<"Quante ore vuoi prenotarlo? ";

        cin>>oreprenotate;

        for(i=0;i<8;i++){

            if(oreprenotate==2){

                                                               if(prenotazioni[oraprenotata]=="libero"||prenotazioni[oraprenotata+1]=="libero"){

                              prenotazioni[oraprenotata-1]=nomeprenotazione;

                              prenotazioni[oraprenotata]=nomeprenotazione;

            }}

            if(oreprenotate==1){

              if(prenotazioni[oraprenotata]=="libero"){

                              prenotazioni[oraprenotata-1]=nomeprenotazione;

                                                               }

                                               }}}

  return 0;

}
