#include <iostream>

using namespace std;

void inserimentosquadre();
void inserimentodati();
void ordinamento();
void classifica();
void maxmin();

string nomi[8][7];
int metri[8][6];
int tot[8];
int minn,maxx;
int totale=0;

int main(){
  inserimentosquadre();
  inserimentodati();
  ordinamento();
  classifica();
  maxmin();
  return 0;
}

void inserimentosquadre(){
  for (int i=0;i<8;i++){
    cout<<"Inserisci il nome della "<<i+1<<" squadra: ";
    cin>>nomi[i][0];
  }
  for (int i=0;i<8;i++){
    for (int j=1;j<7;j++){
      cout<<"Inserisci il nome del "<<j<<" corridore della squadra "<<nomi[i][0]<<": ";
      cin>>nomi[i][j];
    }
  }
}

void inserimentodati(){
  for (int j=0;j<6;j++){
    for (int i=0;i<8;i++){
      cout<<"Inserire i metri percorsi da "<<nomi[i][j+1]<<" della squadra "<<nomi[i][0]<<": ";
      cin>>metri[i][j];
      if ((i==0) && (j==0)){
        minn=metri[i][j];
        maxx=metri[i][j];
      }else{
        if (metri[i][j]>maxx){
          maxx=metri[i][j];
        }
        if (metri[i][j]<minn){
          minn=metri[i][j];
        }
      }
      totale=totale+metri[i][j];
    }
  }
}

void ordinamento(){
  string scambio;
  int scambio2;
  for (int i=0;i<8;i++){
    tot[i]=0;
    for (int j=0;j<6;j++){
      tot[i]=tot[i]+metri[i][j];
    }
  }
  for (int i=0;i<8;i++){
    for (int j=0;j<8-1-i;j++){
      if (nomi[j][0]>nomi[j+1][0]){
        scambio=nomi[j][0];
        nomi[j][0]=nomi[j+1][0];
        nomi [j+1][0]=scambio;
        scambio2=tot[j];
        tot[j]=tot[j+1];
        tot[j+1]=scambio2;
      }
    }
  }
  cout<<"\n\nOrdine alfabetico delle squadre: ";
  for (int i=0;i<8;i++){
    cout<<"\nNome squadra: "<<nomi[i][0]<<"   Metri: "<<tot[i];
  }
}

void classifica(){
  string scambio;
  int scambio2;
  for (int i=0;i<8;i++){
    for (int j=0;j>8-1-i;j++){
      if (tot[j]>tot[j+1]){
        scambio=nomi[j][0];
        nomi[j][0]=nomi[j+1][0];
        nomi [j+1][0]=scambio;
        scambio2=tot[j];
        tot[j]=tot[j+1];
        tot[j+1]=scambio2;
      }
    }
  }
  cout<<"\n\nClassifica: ";
  for (int i=0;i<8;i++){
    cout<<"\n"<<i<<". Nome squadra: "<<nomi[i][0]<<"   Metri: "<<tot[i];
  }
}

void maxmin(){
  cout<<"\n\nAtleti che hanno compiuto piu' metri: ";
  for (int i=0;i<8;i++){
    for (int j=0;j<6;j++){
      if (maxx==metri[i][j]){
        cout<<"Nome: "<<nomi[i][j+1]<<"  Metri: "<<metri[i][j];
      }
    }
  }
  cout<<"\nAtleti che hanno compiuto meno metri: ";
  for (int i=0;i<8;i++){
    for (int j=0;j<6;j++){
      if (minn==metri[i][j]){
        cout<<"Nome: "<<nomi[i][j+1]<<"  Metri: "<<metri[i][j];
      }
    }
  }
  cout<<"\n\nLa media della distanza percorsa da ogni atleta e' "<<totale/48;
}
