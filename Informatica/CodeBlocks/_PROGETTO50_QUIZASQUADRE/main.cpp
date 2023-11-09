#include <iostream>

using namespace std;

string nomi[10][5];
int punti[10][4], tot[10], i, j;

int main(){
  for (i=0;i<10;i++){
    cout<<"Inserisci il nome della "<<i+1<<" squadra: ";
    cin>>nomi[i][4];
  }
  for (i=0;i<10;i++){
    for (j=0;j<4;j++){
      cout<<"Inserisci il nome del "<<j+1<<" partecipante della squadra "<<nomi[i][4];
      cin>>nomi[i][j];
      cout<<"Inserisci il punteggio ottenuto da "<<nomi[i][j]<<", sulle 10 domande, della squadra "<<nomi[i][4];
      cin>>punti[i][j];

    }
  }
  return 0;
}
