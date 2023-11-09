#include <iostream>
#include <string>

using namespace std;

int main(){
  int numcitta;
  cout<<"Su quante citta' vuoi analizzare i dati? ";
  cin>>numcitta;
  string citta[numcitta], Citta;
  float tmax[numcitta], tmin[numcitta];
  for (int i=0;i<numcitta;i++){
    cout<<"\nQual'e' il nome della "<<i+1<<" citta'? ";
    cin>>citta[i];
    cout<<"Qual'e' la temperatura massima di "<<citta[i]<<"? ";
    cin>>tmax[i];
    cout<<"Qual'e' la temperatura minima della "<<citta[i]<<"? ";
    cin>>tmin[i];
    while (tmin[i]>tmax[i]){
      cout<<"La temperatura minima non può essere maggiore di quella massima, rinserisci: ";
      cin>>tmin[i];
    }
  }
  cout<<"\nInserire il nome della città di cui si vogliono sapere i dati: ";
  cin>>Citta;
  for (int i=0;i<numcitta;i++) {
    if (citta[i]==Citta) {
      cout<<"\nLa temperatura massima della citta' e' stata: "<<tmax[i]<<"!";
      cout<<"\nLa temperatura minima della citta' e' stata: "<<tmin[i]<<"!";

    }
  }
  return 0;
}
