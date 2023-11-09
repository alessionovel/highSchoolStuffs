#include <iostream>

using namespace std;

double decimale;
int intero;

int main(){
  cout<<"Inserisci il numero decimale che si vuole convertire in binario: ";
  cin>>decimale;
  intero=decimale;
  decimale=decimale-intero;
  while(intero!=0){
    intero%2;
  intero=intero/2;
  }
  return 0;
}
