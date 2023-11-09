#include <iostream>

using namespace std;

int main() {
	int a, b, c;
	cout<<"Inserire il primo voto: ";
	cin>> a;
	cout<<"Inserire il secondo voto: ";
	cin>> b;
	cout<<"Il primo voto e': "<<a<<"!\nIl secondo voto e': "<<b<<"!\n";
	c=b;
	b=a;
	a=c;
	cout<<"Adesso il primo voto e': "<<a<<"!\nIl secondo voto e': "<<b<<"!\n";
	system ("PAUSE");
	return 0;
}
