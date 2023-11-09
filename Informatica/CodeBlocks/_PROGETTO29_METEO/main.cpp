#include <iostream>

using namespace std;

int main() {
  int g, gAlta, gBassa;
  float gMax, gMin, sMax, sMin, mMax, mMin, mTot;
  cout<<"Quanti giorni ha il mese su cui vuoi analizzare i dati? ";
  cin>>g;
  float tMax[g], tMin[g];
  while (!cin || g<28 || g>31){
  	cout<<"Il valore inserito non risulta valido!\nInserire un altro valore: ";
  	cin.clear();
  	cin.ignore();
  	cin>>g;
  }
  for(int i=0;i<g;i++){
  	cout<<"\nInserire la temperatura massima del giorno "<<i+1<<" in gradi: ";
  	cin>>tMax[i];
  	cout<<"Inserire la temperatura minima del giorno "<<i+1<<" in gradi: ";
  	cin>>tMin[i];
  	while (tMax[i]<tMin[i]){
  	  cout<<"La temperatura massima non puo' essere piu' piccola di quella minima";
  	  cout<<"\nInserire la temperatura massima del giorno "<<i+1<<" in gradi: ";
  	  cin>>tMax[i];
  	  cout<<"Inserire la temperatura minima del giorno "<<i+1<<" in gradi: ";
  	  cin>>tMin[i];
  	}
  	if (i==0){
  	  gMax=tMax[i];
  	  gMin=tMin[i];
  	  gAlta=i+1;
  	  gBassa=i+1;
	} else{
	  if (gMax<tMax[i]){
	  	gMax=tMax[i];
	  	gAlta=i+1;
	  }
	  if (gMin>tMin[i]){
	  	gMin=tMin[i];
	  	gBassa=i+1;
	  }
	}
    sMax=sMax+tMax[i];
    sMin=sMin+tMin[i];
  }
  mMax=sMax/g;
  cout<<"\nLa media delle temperature massime e' di "<<mMax<<" gradi\n";
  mMin=sMin/g;
  cout<<"La media delle temperature minime e' di "<<mMin<<" gradi\n";
  cout<<"\nLa temperatura piu' alta e' stata il giorno "<<gAlta<<" in cui ci sono stati "<<gMax<<" gradi!\n";
  cout<<"La temperatura piu' bassa e' stata il giorno "<<gBassa<<" in cui ci sono stati "<<gMin<<" gradi!\n";
  mTot=(mMax+mMin)/2;
  cout<<"\nLa media totale e' di "<<mTot<<" gradi!\n";
  return 0;
}
