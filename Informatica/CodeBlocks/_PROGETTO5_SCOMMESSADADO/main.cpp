#include <iostream>
#include <stdlib.h>



using namespace std;

int main() {
	cout<<"Scegli un numero da 1 a 6 su cui scommettere: ";
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
    if (casuale==numero)
    cout<<"Complimenti, hai vinto con il numero "<<casuale<<"!" ;
    else
    cout<<"Accidenti hai perso, il numero era "<<casuale<<"!";

    int decisione;
    cout<<"\nVuoi riprovare? Se si inserisci 1, senno' inserisci qualsiasi altro carattere: ";
    cin>>decisione;
    if (decisione==1)
    {
    cout<<"Perfetto. ";
    return main();
    }


	system("pause");
	return 0;
}
