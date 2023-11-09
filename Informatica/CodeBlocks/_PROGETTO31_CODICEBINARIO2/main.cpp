#include <iostream>

using namespace std;

int main(){
  int lunghezza, sommatot=0, j=0;
  cout<<"Quanti bit compongono il numero binario? ";
  cin>>lunghezza;
  int cifre[lunghezza];
  while (lunghezza>0){
    cout<<"Inserire la "<<j+1<<" cifra del numero binario: ";
    cin>>cifre[j];
    if (cifre[j]==1 & lunghezza!=1){
      int potenza=lunghezza-1;
      int somma=2;
      for (int i=0; i<potenza-1; i++) {
        somma=somma*2;
      }
      sommatot=somma+sommatot;
    } else if (cifre [j] & lunghezza==1){
        sommatot=sommatot+1;
      }
    lunghezza=lunghezza-1;
    j++;
  }
  cout<<"\nLa somma totale e' "<<sommatot;

  return 0;
}
