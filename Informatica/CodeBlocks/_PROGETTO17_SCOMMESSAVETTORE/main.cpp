#include <iostream>
#include <cstdlib>
#include <windows.h>
#include <time.h>

using namespace std;

int main()
{
	int r;
	cout<<"Quanto vuoi che sia lungo il tuo vettore?(Un numero da 4 a 6)\n";
	cin>> r;

	 if (r>=4 && r<=6)
        {
        cout<<"Il tuo vettore e' lungo: "<<r<<"!\n";
        }

	else
        {
        cout<<"Il vettore non può essere cosi lungo \n";
        return main();
        }

    int n;
    cout<<"Su che numero vuoi scommettere?";
    cin>>n;
    if (n>=1 && n<=20)
        {
        cout<<"Stai scommettendo sul numero "<<n<<"!\n";
        }

	else
        {
        cout<<"Questo numero non puo' essere scommesso!\n";
        return main();
        }

        int casuale;
        int V[r];
        int i;
        cout<<"I numeri del vettore sono: \n";
        for(i=0;i<r;i++)
        {
		srand(time(NULL));
		system("pause");
        casuale=rand()%20+1;
        V[i]=casuale;
        cout<<V[i]<<"\n";
        }

        if (n==V[1]||n==V[2]||n==V[3]||n==V[4]||n==V[5]||n==V[6])
		{
		cout<<"Complimenti, hai vinto!\n" ;
		}
		else
		{
		cout<<"Accidenti hai perso!\n";
		}
        system("pause");

}
