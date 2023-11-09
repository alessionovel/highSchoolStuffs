#include <iostream>
#include <stdlib.h>
#include <time.h>
#include <windows.h>

using namespace std;

void inserimentonomi();
void inizializzazione();
void navi11();
void navi21();
void navi12();
void navi22();
void gioco1();
void gioco2();

int campo1[8][8], campo2[8][8], vittoria=0,i,j;
char  colpi1[8][8], colpi2[8][8];
string nome1,nome2;

int main(){
  srand((unsigned int)time(0));
  inserimentonomi();
  inizializzazione();
  for (int i=0;i<3;i++){
    navi11();
  }
  for (int i=0;i<2;i++){
    navi21();
  }
  for (int i=0;i<3;i++){
    navi12();
  }
  for (int i=0;i<2;i++){
    navi22();
  }
  /*for (int i=0;i<8;i++){
    cout<<"\n";
    for (int j=0;j<8;j++){
      cout<<campo1[i][j]<<" " ;
    }
  }
  cout<<"\n\n";
    for (int i=0;i<8;i++){
    cout<<"\n";
    for (int j=0;j<8;j++){
      cout<<campo2[i][j]<<" " ;
    }
  }*/
  while (vittoria==0){
    gioco1();
    if (vittoria==0){
      gioco2();
    }
  }
  cout<<"\n\nComplimenti, hai vinto!\n";

  return 0;
}

void inserimentonomi(){
  cout<<"Inserisci il nome del primo partecipante: ";
  cin>>nome1;
  cout<<"Inserisci il nome del secondo partecipante: ";
  cin>>nome2;
}

void inizializzazione(){
  for (int i=0;i<8;i++){
    for (int j=0;j<8;j++){
      campo1[i][j]=0;
      campo2[i][j]=0;
      colpi1[i][j]='#';
      colpi2[i][j]='#';
    }
  }

}

void navi11(){
  int righe,colonne,controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (campo1[righe][colonne]==0){
      if ((campo1[righe-1][colonne]==0) && (campo1[righe+1][colonne]==0) && (campo1[righe][colonne-1]==0) && (campo1[righe][colonne+1]==0) && (campo1[righe-1][colonne-1]==0) && (campo1[righe+1][colonne-1]==0) && (campo1[righe-1][colonne+1]==0) && (campo1[righe+1][colonne+1]==0)){
        campo1[righe][colonne]=1;
        controllo=1;
      }
    }
  }
}

void navi21(){
  int righe,colonne,righe2,colonne2,controllo=0,casella;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    righe2=righe;
    colonne2=colonne;
    if ((righe!=0) && (righe!=7) && (colonne!=0) && (colonne!=7)){
      if (campo1[righe][colonne]==0){
        if ((campo1[righe-1][colonne]==0) && (campo1[righe+1][colonne]==0) && (campo1[righe][colonne-1]==0) && (campo1[righe][colonne+1]==0) && (campo1[righe-1][colonne-1]==0) && (campo1[righe+1][colonne-1]==0) && (campo1[righe-1][colonne+1]==0) && (campo1[righe+1][colonne+1]==0)){
          casella=rand()%4;
          if (casella==0) righe2--;
          if (casella==1) righe2++;
          if (casella==2) colonne2--;
          if (casella==3) colonne2++;
          if ((campo1[righe2-1][colonne2]==0) && (campo1[righe2+1][colonne2]==0) && (campo1[righe2][colonne2-1]==0) && (campo1[righe2][colonne2+1]==0) && (campo1[righe2-1][colonne2-1]==0) && (campo1[righe2+1][colonne2-1]==0) && (campo1[righe2-1][colonne2+1]==0) && (campo1[righe2+1][colonne2+1]==0)){
            campo1[righe][colonne]=1;
            campo1[righe2][colonne2]=1;
            controllo=1;
          }
        }
      }
    }else{
      if ((campo1[righe-1][colonne]==0) && (campo1[righe+1][colonne]==0) && (campo1[righe][colonne-1]==0) && (campo1[righe][colonne+1]==0) && (campo1[righe-1][colonne-1]==0) && (campo1[righe+1][colonne-1]==0) && (campo1[righe-1][colonne+1]==0) && (campo1[righe+1][colonne+1]==0)){
        if (campo1[righe][colonne]==0){
          if (righe==0){
            if (colonne==0){
              casella=rand()%2;
              if (casella==0) righe2++;
              if (casella==1) colonne2++;
            }else if (colonne==7){
              casella=rand()%2;
              if (casella==0) righe2++;
              if (casella==1) colonne2--;
            }else{
              casella=rand()%3;
              if (casella==0) colonne2++;
              if (casella==1) righe2++;
              if (casella==2) colonne2--;
            }
          }else if (righe==7){
            if (colonne==0){
              casella=rand()%2;
              if (casella==0) righe2--;
              if (casella==1) colonne2++;
            }else if (colonne==7){
              casella=rand()%2;
              if (casella==0) righe2--;
              if (casella==1) colonne2--;
            }else{
              casella=rand()%3;
              if (casella==0) colonne2++;
              if (casella==1) righe2--;
              if (casella==2) colonne2--;
            }
          }else if (colonne==0){
            casella=rand()%3;
            if (casella==0) colonne2++;
            if (casella==1) righe2++;
            if (casella==2) righe2--;
          }else if (colonne==7){
            casella=rand()%3;
            if (casella==0) colonne2--;
            if (casella==1) righe2++;
            if (casella==2) righe2--;
          }
          if ((campo1[righe2-1][colonne2]==0) && (campo1[righe2+1][colonne2]==0) && (campo1[righe2][colonne2-1]==0) && (campo1[righe2][colonne2+1]==0) && (campo1[righe2-1][colonne2-1]==0) && (campo1[righe2+1][colonne2-1]==0) && (campo1[righe2-1][colonne2+1]==0) && (campo1[righe2+1][colonne2+1]==0)){
            campo1[righe][colonne]=1;
            campo1[righe2][colonne2]=1;
            controllo=1;
          }
        }
      }
    }
  }
}

void navi12(){
  int righe,colonne,controllo=0;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    if (campo2[righe][colonne]==0){
      if ((campo2[righe-1][colonne]==0) && (campo2[righe+1][colonne]==0) && (campo2[righe][colonne-1]==0) && (campo2[righe][colonne+1]==0) && (campo2[righe-1][colonne-1]==0) && (campo2[righe+1][colonne-1]==0) && (campo2[righe-1][colonne+1]==0) && (campo2[righe+1][colonne+1]==0)){
        campo2[righe][colonne]=1;
        controllo=1;
      }
    }
  }
}

void navi22(){
  int righe,colonne,righe2,colonne2,controllo=0,casella;
  while (controllo==0){
    righe=rand()%8;
    colonne=rand()%8;
    righe2=righe;
    colonne2=colonne;
    if ((righe!=0) && (righe!=7) && (colonne!=0) && (colonne!=7)){
      if (campo2[righe][colonne]==0){
        if ((campo2[righe-1][colonne]==0) && (campo2[righe+1][colonne]==0) && (campo2[righe][colonne-1]==0) && (campo2[righe][colonne+1]==0) && (campo2[righe-1][colonne-1]==0) && (campo2[righe+1][colonne-1]==0) && (campo2[righe-1][colonne+1]==0) && (campo2[righe+1][colonne+1]==0)){
          casella=rand()%4;
          if (casella==0) righe2--;
          if (casella==1) righe2++;
          if (casella==2) colonne2--;
          if (casella==3) colonne2++;
          if ((campo2[righe2-1][colonne2]==0) && (campo2[righe2+1][colonne2]==0) && (campo2[righe2][colonne2-1]==0) && (campo2[righe2][colonne2+1]==0) && (campo2[righe2-1][colonne2-1]==0) && (campo2[righe2+1][colonne2-1]==0) && (campo2[righe2-1][colonne2+1]==0) && (campo2[righe2+1][colonne2+1]==0)){
            campo2[righe][colonne]=1;
            campo2[righe2][colonne2]=1;
            controllo=1;
          }
        }
      }
    }else{
      if ((campo2[righe-1][colonne]==0) && (campo2[righe+1][colonne]==0) && (campo2[righe][colonne-1]==0) && (campo2[righe][colonne+1]==0) && (campo2[righe-1][colonne-1]==0) && (campo2[righe+1][colonne-1]==0) && (campo2[righe-1][colonne+1]==0) && (campo2[righe+1][colonne+1]==0)){
        if (campo2[righe][colonne]==0){
          if (righe==0){
            if (colonne==0){
              casella=rand()%2;
              if (casella==0) righe2++;
              if (casella==1) colonne2++;
            }else if (colonne==7){
              casella=rand()%2;
              if (casella==0) righe2++;
              if (casella==1) colonne2--;
            }else{
              casella=rand()%3;
              if (casella==0) colonne2++;
              if (casella==1) righe2++;
              if (casella==2) colonne2--;
            }
          }else if (righe==7){
            if (colonne==0){
              casella=rand()%2;
              if (casella==0) righe2--;
              if (casella==1) colonne2++;
            }else if (colonne==7){
              casella=rand()%2;
              if (casella==0) righe2--;
              if (casella==1) colonne2--;
            }else{
              casella=rand()%3;
              if (casella==0) colonne2++;
              if (casella==1) righe2--;
              if (casella==2) colonne2--;
            }
          }else if (colonne==0){
            casella=rand()%3;
            if (casella==0) colonne2++;
            if (casella==1) righe2++;
            if (casella==2) righe2--;
          }else if (colonne==7){
            casella=rand()%3;
            if (casella==0) colonne2--;
            if (casella==1) righe2++;
            if (casella==2) righe2--;
          }
          if ((campo2[righe2-1][colonne2]==0) && (campo2[righe2+1][colonne2]==0) && (campo2[righe2][colonne2-1]==0) && (campo2[righe2][colonne2+1]==0) && (campo2[righe2-1][colonne2-1]==0) && (campo2[righe2+1][colonne2-1]==0) && (campo2[righe2-1][colonne2+1]==0) && (campo2[righe2+1][colonne2+1]==0)){
            campo2[righe][colonne]=1;
            campo2[righe2][colonne2]=1;
            controllo=1;
          }
        }
      }
    }
  }
}

void gioco1(){
  int riga,colonna,zero;
  cout<<"\n\nTURNO DI "<<nome1;
  for (int i=0;i<8;i++){
    cout<<"\n";
    for (int j=0;j<8;j++){
      cout<<colpi1[i][j]<<" " ;
    }
  }
  cout<<"\n\nLEGENDA:\n#=non scoperto\nC=nave colpita\nA=acqua";
  cout<<"\n\nInserisci il numero della riga in cui vuoi colpire: ";
  cin>>riga;
  while ((riga<1) || (riga>8)){
    cout<<"\n\nERRORE!\nInserisci il numero della riga in cui vuoi colpire: ";
    cin>>riga;
  }
  riga=riga-1;
  cout<<"Inserisci il numero della colonna in cui vuoi colpire: ";
  cin>>colonna;
  while ((colonna<1) || (colonna>8)){
    cout<<"\n\nERRORE!\nInserisci il numero della colonna in cui vuoi colpire: ";
    cin>>colonna;
  }
  colonna=colonna-1;
  if (campo2[riga][colonna]==1){
    if ((campo2[riga-1][colonna]==1) || (campo2[riga+1][colonna]==1) || (campo2[riga][colonna-1]==1) || (campo2[riga][colonna+1]==1)){
      cout<<"Colpito";
      colpi1[riga][colonna]='C';
      campo2[riga][colonna]=0;
    }else{
      cout<<"Colpito e affondato";
      colpi1[riga][colonna]='C';
      campo2[riga][colonna]=0;
    }
  }else{
    cout<<"Acqua";
    colpi1[riga][colonna]='A';
  }
  i=0;
  zero=0;
  while ((i<8) && (zero==0)){
    j=0;
    while ((j<8) && (zero==0)){
      if (campo2[i][j]==1){
        zero=1;
      }
      j++;
    }
    i++;
  }
  if (zero==0)vittoria=1;
  cout<<"\n\n";
  system("pause");
  system("cls");
}

void gioco2(){
  int riga,colonna,zero;
  cout<<"\n\nTURNO DI "<<nome2;
  for (int i=0;i<8;i++){
    cout<<"\n";
    for (int j=0;j<8;j++){
      cout<<colpi2[i][j]<<" " ;
    }
  }
  cout<<"\n\nLEGENDA:\n#=non scoperto\nC=nave colpita\nA=acqua";
  cout<<"\n\nInserisci il numero della riga in cui vuoi colpire: ";
  cin>>riga;
  while ((riga<1) || (riga>8)){
    cout<<"\n\nERRORE!\nInserisci il numero della riga in cui vuoi colpire: ";
    cin>>riga;
  }
  riga=riga-1;
  cout<<"Inserisci il numero della colonna in cui vuoi colpire: ";
  cin>>colonna;
  while ((colonna<1) || (colonna>8)){
    cout<<"\n\nERRORE!\nInserisci il numero della colonna in cui vuoi colpire: ";
    cin>>colonna;
  }
  colonna=colonna-1;
  if (campo1[riga][colonna]==1){
    if ((campo1[riga-1][colonna]==1) || (campo1[riga+1][colonna]==1) || (campo1[riga][colonna-1]==1) || (campo1[riga][colonna+1]==1)){
      cout<<"Colpito";
      colpi2[riga][colonna]='C';
      campo1[riga][colonna]=0;
    }else{
      cout<<"Colpito e affondato";
      campo1[riga][colonna]=0;
      colpi2[riga][colonna]='C';
    }
  }else{
    cout<<"Acqua";
    colpi2[riga][colonna]='A';
  }
  i=0;
  zero=0;
  while ((i<8) && (zero==0)){
    j=0;
    while ((j<8) && (zero==0)){
      if (campo1[i][j]==1){
        zero=1;
      }
      j++;
    }
    i++;
  }
  if (zero==0)vittoria=1;
  cout<<"\n\n";
  system("pause");
  system("cls");
}
