#include <iostream>

using namespace std;

int main() {
	cout<<"Inserire un numero: ";
	int numero;
	cin>>numero;
	int resto;
	resto=numero%2;
	if (resto!=0) cout<<"\nIl numero e' DISPARI!";
	else cout<<"\nIl numero e' PARI";
	system("PAUSE");
	return 0;
}
