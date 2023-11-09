#include <iostream>
using namespace std ;
main ()
{
int numero ;
cout << "GIOCHIAMO! \nInserisci un numero: " << endl ;
cin >> numero ;
cout<<"Per me il numero e'dispari!";
if (numero%2==0) cout << "\nNoo, questo round l'hai vinto te!" << endl ;
else cout << "\nSii' questo round l'ho vinto io!" << endl ;
cout<< "Secondo round! \nInserisci un numero: " << endl;
cin >> numero ;
cout<<"Per me il numero e'pari!";
if (numero%2==0) cout << "\nSii', questo round l'ho vinto io!" << endl ;
else cout << "\nNoo questo round l'hai vinto tu!" << endl ;
cout<< "Terzo round! \nInserisci un numero: " << endl;
cin >> numero ;
cout<<"Per me il numero e'pari!";
if (numero%2==0) cout << "\nSii', questo round l'ho vinto io!" << endl ;
else cout << "\nNoo questo round l'hai vinto tu!" << endl ;
cout<<"Bella partita! \n02.Ci vediamo!";
}
