#include <iostream>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

using namespace std;

int main() {
	float ab, h, V;
	cout<<"Inserire la misura del raggio di base: ";
	cin>>ab;
	cout<<"\nInserire la misura dell'altezza: ";
	cin>>h;
	V=ab*h;
	cout<<"\nIl volume misura: "<<V;
	system("PAUSE");
	return 0;
}
