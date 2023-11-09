#include <iostream>

using namespace std;

int main(){
  int numvoti,votomax=1,votomin=10,somma=0;
  double media;
  cout<<"Quanti voti vuoi inserire? ";
  cin>>numvoti;
  int voti[numvoti];
  for (int i=0;i<numvoti;i++){
    while (voti[i]<1 || voti[i]>10){
      cout<<"Inserire il "<<i+1<<" voto: ";
      cin>>voti[i];
    }
    somma=somma+voti[i];
    if (voti[i]>votomax) votomax=voti[i];
    if (voti[i]<votomin) votomin=voti[i];
  }
  media=somma/numvoti;
  cout<<"La media e' di: "<<media<<" !\nIl voto piu' alto e': "<<votomax<<" !\nIl voto piu' basso e': "<<votomin<<" !";
  return 0;
}
