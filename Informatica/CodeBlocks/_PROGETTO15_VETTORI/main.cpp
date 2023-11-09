#include <iostream>

using namespace std;

int main() {
	int V[10];
	int i;
	for(i=0;i<10;i++)
	{
	V[i]=0;
	cout<<V[i]<<"\n";
	}
	for(i=0;i<10;i++)
	{
	cout<<"Inserisci un numero: ";
	cin>>V[i];
	}
	for(i=0;i<10;i++)cout<<V[i]<<"\n";
	return 0;
}
