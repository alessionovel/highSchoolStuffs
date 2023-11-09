#include <iostream>
#include <cstdlib>
#include <time.h>
#include <string>
using namespace std;

int main() {
int N,quantita1,quantita2,ciclo;
float costo1,costo2,totale;
string ingrediente1,ingrediente2;
srand (time(NULL));
N=rand()%3+1;
ciclo=0;
if (N==1){
	cout<<"\n CIAO!";
}
else {}
if(N==2){

cout<<"primo ingrediente";
cin>> ingrediente1;
cout<<"costo primo"	;
cin >>costo1;
cout<<"quantita primo";
cin >> quantita1;
cout<<"secondo ingrediente";
cin >>ingrediente2;
cout<<"costo secondo";
cin >>costo2;
cout<<"quantita secondo";
cin>>quantita2;

totale=(costo1*quantita1)+(costo2*quantita2);
cout<<"il totale ottenuto corrisponde a:"<<totale;
}
