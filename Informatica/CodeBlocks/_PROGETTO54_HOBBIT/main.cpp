#include <iostream>
#include <windows.h>
#include <time.h>
#include <conio.h>
#include <stdio.h>

using namespace std;

void menu(), generazionecampi(), mostramappa(char campo[8][8]), portali(char campo1[8][8]), orco(), spada(), moneta(), chiave(), home(), forziere(), razioni(), movimento(), inventario();

char pianura[8][8], bosco[8][8];
bool fine,pian,chiav,spad,win,fineprogramma=false;
int r=0,c=0,movimenti,monete,rf=0,cf=0;

int main(){
  while (fineprogramma==false){
    menu();
    if (fineprogramma==false){
      srand((unsigned int)time(0));
      generazionecampi();
      fine=false;
      while (fine==false){
        system("cls");
        cout<<"PIANURA";
        mostramappa(pianura);
        cout<<"\nBOSCO";
        mostramappa(bosco);
        inventario();
        movimento();
      }
      system("cls");
      if (win==true)cout<<"Complimenti, hai vinto!\n";
      if (win==false)cout<<"Mi dispiace, hai perso!\n";
      system("PAUSE");
      system("cls");
    }
  }
}

void menu(){
  system("color 0C");
  int scelta=2;
  while (scelta==2){
    cout<<"1. Inizia partita\n2. Regole\n3. Esci\n\nScelta: ";
    cin>>scelta;
    while (scelta<1 || scelta>3){
      cout<<"Errore, reinserisci: ";
    }
    if (scelta==2){
      system("cls");
      cout<<"REGOLE:\n1. Portale si riposiziona ad ogni uso\n2. S(spada)-M(moneta)-R(razione)-C(chiave): sono raccoglibili\n3. Quando ci si scontra con O(orco): se si possiede S(spada) lo si uccide, altrimenti si muore e si perde\n4. Il forziere e' nascosto: se lo si trova e si ha la chiave guadagni 5 M(monete), altrimenti il forziere cambia posizione\n5. Per vincere bisogna comprare la H(casa) che costa 8 monete\n";
      system("PAUSE");
      system("cls");
    }
    if (scelta==3){
      fineprogramma=true;
    }
  }
}

void generazionecampi(){
  movimenti=30;
  monete=0;
  pian=true;
  chiav=false;
  spad=false;
  for (int i=0;i<8;i++){
    for (int j=0;j<8;j++){
      pianura[i][j]=0;
      bosco[i][j]=0;
    }
  }
  pianura[r][c]='#';
  portali(pianura);
  portali(bosco);
  for(int i=0;i<2;i++){
    orco();
  }
  spada();
  for(int i=0;i<5;i++){
    moneta();
  }
  chiave();
  home();
  forziere();
  for(int i=0;i<5;i++){
    razioni();
  }
}

void mostramappa(char campo[8][8]){
  cout<<"\n+---------------+";
  for (int i=0;i<8;i++){
    cout<<"\n|";
    for (int j=0;j<8;j++){
      cout<<campo[i][j];
      if (j!=7) cout<<" ";
    }
    cout<<"|";
  }
  cout<<"\n+---------------+";
}

void portali(char campo[8][8]){
  int righe, colonne, controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (campo[righe][colonne]==0 && righe!=rf && colonne!=cf){
      campo[righe][colonne]='P';
      controllo=1;
    }
  }
}

void orco(){
  int righe, colonne, controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (bosco[righe][colonne]==0){
      bosco[righe][colonne]='O';
      controllo=1;
    }
    if (bosco[righe][colonne]=='P'){
      for (int i=0;i<8;i++){
        for (int j=0;j<8;j++){
          if (pianura[i][j]=='P')
            pianura[i][j]='Q';
        }
      }
      controllo=1;
    }
  }
}

void spada(){
  int righe, colonne, controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (pianura[righe][colonne]==0){
      pianura[righe][colonne]='S';
      controllo=1;
    }
  }
}

void moneta(){
  int campo,controllo=0,righe,colonne;
  campo=rand()%2;
  if (campo==0){
    while (controllo==0){
      righe=rand()%8;
      colonne=rand()%8;
      if (pianura[righe][colonne]==0){
        pianura[righe][colonne]='M';
        controllo=1;
      }
    }
  }else{
    while (controllo==0){
      righe=rand()%8;
      colonne=rand()%8;
      if (bosco[righe][colonne]==0){
        bosco[righe][colonne]='M';
        controllo=1;
      }
    }
  }
}

void chiave(){
  int righe, colonne, controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (pianura[righe][colonne]==0){
      pianura[righe][colonne]='C';
      controllo=1;
    }
  }
}

void home(){
  int righe, colonne, controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (pianura[righe][colonne]==0){
      pianura[righe][colonne]='H';
      controllo=1;
    }
  }
}

void razioni(){
  int campo,controllo=0,righe,colonne;
  campo=rand()%2;
  if (campo==0){
    while (controllo==0){
      righe=rand()%8;
      colonne=rand()%8;
      if (pianura[righe][colonne]==0){
        pianura[righe][colonne]='R';
        controllo=1;
      }
    }
  }else{
    while (controllo==0){
      righe=rand()%8;
      colonne=rand()%8;
      if (bosco[righe][colonne]==0){
        bosco[righe][colonne]='R';
        controllo=1;
      }
    }
  }
}

void forziere(){
 int rf1, cf1, controllo=0;
  while (controllo==0){
    rf1=rand()%8;
    cf1=rand()%8;
    if (bosco[rf1][cf1]==0){
      rf=rf1;
      cf=cf1;
      controllo=1;
    }
  }
}

void movimento(){
  int r1=r,c1=c;
  movimenti--;
  int key=0;
  cout<<"\n\nUsa le frecce direzionali per muoverti\n";
  while (key!=72 && key!=75 && key!=77 && key!=80) {
    key=getch();
    if (key==224) {
      key=getch();
      switch (key) {
        case 72:{
          if(r1!=0){
            r1--;
          }
        }
        break;
        case 75:{
          if(c1!=0){
            c1--;
          }
        }
        break;
        case 77:{
          if(c1!=7){
            c1++;
          }
        }
        break;
        case 80:{
          if(r1!=7){
            r1++;
          }
        }
        break;
      }
    }
    char scambio;
    if (pian==true){
      if (pianura[r1][c1]=='P'){
        for (int i=0;i<8;i++){
          for (int j=0;j<8;j++){
            if (bosco[i][j]=='P'){
              pianura[r][c]=0;
              bosco[i][j]='#';
              pianura[r1][c1]=0;
              r=i;
              c=j;
              pian=false;
            }
          }
        }
        portali(pianura);
        portali(bosco);
      }else if (pianura[r1][c1]=='Q'){
        if (spad==true){
          for (int i=0;i<8;i++){
            for (int j=0;j<8;j++){
              if (bosco[i][j]=='P'){
                pianura[r][c]=0;
                bosco[i][j]='#';
                pianura[r1][c1]=0;
                r=i;
                c=j;
                pian=false;
                win=false;
              }
            }
          }
          portali(pianura);
          portali(bosco);
        }else{
          fine=true;
        }
      }else if (pianura[r1][c1]=='C'){
        pianura[r1][c1]='#';
        pianura[r][c]=0;
        chiav=true;
        r=r1;
        c=c1;
      }else if (pianura[r1][c1]=='S'){
        pianura[r1][c1]='#';
        pianura[r][c]=0;
        spad=true;
        r=r1;
        c=c1;
      }else if (pianura[r1][c1]=='M'){
        pianura[r1][c1]='#';
        pianura[r][c]=0;
        monete++;
        r=r1;
        c=c1;
      }else if (pianura[r1][c1]=='R'){
        pianura[r1][c1]='#';
        pianura[r][c]=0;
        movimenti=movimenti+10;
        r=r1;
        c=c1;
      }else if (pianura[r1][c1]=='H'){
        if (monete>8){
          fine=true;
          win=true;
        }
      }else{
        scambio=pianura[r1][c1];
        pianura[r1][c1]=pianura[r][c];
        pianura[r][c]=scambio;
        r=r1;
        c=c1;
      }
    }else{
      if (bosco[r1][c1]=='P'){
        for (int i=0;i<8;i++){
          for (int j=0;j<8;j++){
            if (pianura[i][j]=='P'){
              bosco[r][c]=0;
              pianura[i][j]='#';
              bosco[r1][c1]=0;
              r=i;
              c=j;
              pian=true;
            }
          }
        }
        portali(pianura);
        portali(bosco);
      }else if (bosco[r1][c1]=='M'){
        bosco[r1][c1]='#';
        bosco[r][c]=0;
        monete++;
        r=r1;
        c=c1;
      }else if (bosco[r1][c1]=='R'){
        bosco[r1][c1]='#';
        bosco[r][c]=0;
        movimenti=movimenti+10;
        r=r1;
        c=c1;
      }else if (bosco[r1][c1]=='O'){
        if (spad==true){
          bosco[r1][c1]='#';
          bosco[r][c]=0;
          r=r1;
          c=c1;
        }else{
          fine=true;
          win=false;
        }
      }else if (r1==rf && c1==cf){
        if (chiav==true){
          bosco[r1][c1]='#';
          bosco[r][c]=0;
          monete=monete+5;
          rf=-1;
          cf=-1;
          r=r1;
          c=c1;
          system("cls");
          cout<<"FORZIERE APERTO!\n";
          system("PAUSE");
        }else{
          bosco[r1][c1]='#';
          bosco[r][c]=0;
          forziere();
          r=r1;
          c=c1;
          system("cls");
          cout<<"FORZIERE BLOCCATO!\n";
          system("PAUSE");
        }
        r=r1;
        c=c1;
      }else{
        scambio=bosco[r1][c1];
        bosco[r1][c1]=bosco[r][c];
        bosco[r][c]=scambio;
        r=r1;
        c=c1;
      }
    }
  }
  if (movimenti==0){
    fine=true;
    win=false;
  }
}

void inventario(){
  cout<<"\n\nMovimenti: "<<movimenti;
  cout<<"\nMonete: "<<monete;
  if (spad==true){
    cout<<"\nSpada: SI";
  }else{
    cout<<"\nSpada: NO";
  }
  if (chiav==true){
    cout<<"\nChiave: SI";
  }else{
    cout<<"\nChiave: NO";
  }
}
