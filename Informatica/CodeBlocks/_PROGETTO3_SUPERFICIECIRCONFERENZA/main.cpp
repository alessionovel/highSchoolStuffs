#include <iostream>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

using namespace std;

int main() {
	float raggio;
	cout<<"Inserire la misura del raggio: ";
	cin>>raggio;
	float C,A;
	C=2*3,14*raggio;
	A=raggio*raggio*3,14;
	cout<<"\nLa circonferenza misura: "<< C;
	cout<<"\nL'area misura: "<< A;
	system("PAUSE");
	return 0;
}
