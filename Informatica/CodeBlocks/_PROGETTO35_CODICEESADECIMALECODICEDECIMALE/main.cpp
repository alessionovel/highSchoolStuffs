#include <iostream>
#include <math.h>
using namespace std;

int main(){
  int n, tot=0;
  int risultato;
  cout<<"Inserire il numero di caratteri del numero esadecimale: ";
  cin>>n;
  while (n<1 || n>3 || !cin){
    cout<<"Il numero deve essere compreso tra 1 e 3, reinseriscilo: ";
    cin.clear();
  	cin.ignore();
  	cin>>n;
  }
  char cifra;
  for (int i=0;i<n;i++){
    cout<<"Inserire la "<<i+1<<" cifra: ";
    cin>>cifra;
    if (cifra>47 && cifra<58){
      cifra=cifra-48;
    }
    if (cifra>96 && cifra<123){
      cifra=cifra-32;
    }
    if (cifra>64 && cifra<71){
      cifra=cifra-55;
    }
    while (cifra<0 || cifra>15){
      cout<<"La cifra deve fare parte del codice esadecimale, reinseriscila: ";
      cin.clear();
  	  cin.ignore();
  	  cin>>cifra;
  	  if (cifra>47 && cifra<58){
        cifra=cifra-48;
      }
  	  if (cifra>96 && cifra<123){
        cifra=cifra-32;
      }
      if (cifra>64 && cifra<71){
        cifra=cifra-55;
      }
    }
    tot=tot+(pow(16, n-(i+1))*cifra);
  }
    cout<<tot;
  return 0;
}
