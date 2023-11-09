#include <iostream>
#include <stdlib.h>



using namespace std;

int main() {
	int dec,i;
	dec=1;
	i=0;
	while (dec<=10) {

	cout<<" Scegli un numero da 1 a 6 su cui scommettere: ";
	int numero;
	cin>>numero;
	if (numero>=1 && numero<=6)
	cout<<"Stai scommettendo sul numero "<<numero<<"!\n";
	else
	{
	cout<<"Questo numero non puo' essere scommesso!";
	return main();
	}
	int casuale;
    casuale=rand()%6 + 1;
    if (casuale==numero){

    cout<<"Complimenti, hai vinto con il numero "<<casuale<<"!" ;
    i=i+1;
	}
	else
    cout<<"Accidenti hai perso, il numero era "<<casuale<<"!";
    dec=dec+1;
    }

    cout<<"Hai vinto "<<i<<" volte!";


	system("pause");
	return 0;
}
