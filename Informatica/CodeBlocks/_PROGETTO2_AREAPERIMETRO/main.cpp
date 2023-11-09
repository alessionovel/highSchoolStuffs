#include <iostream>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

using namespace std;

int main() {
	int base, altezza, P, A;
	cout<< "Inserire la base:";
	cin>> base;
	cout<<"\nInserire l'altezza:";
	cin>> altezza;
	P=(base + altezza)*2;
	A=(base * altezza);
	cout<<"\nIl perimetro misura:"<< P;
	cout<<"\nL'area misura:" << A;
	system("PAUSE");

	return 0;
}
