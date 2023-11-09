#include <iostream>

using namespace std;

int main() {
	//chiedere di inserire il numero
	cout<<"Inserire un importo: ";
	//dichiarare la variabile
	float importo;
	//inserire il numero nella variabile importo
	cin>>importo;
	//dichiarare la variabile
	float tassa;
	//se il numero è minore di 1000 calcola una tassa del 5%
	if (importo<1000) {
		cout<<"La tassa e' del 5%";
		tassa=importo*0.05;
		}
	//altrimenti una tassa del 10%
	else {
		cout<<"La tassa e' del 10%";
		tassa=importo*0.1;
		}
	//mostra l'importo con la tassa calcolata
	cout<<"\n\nL'importo e' "<<importo<<" euro\nLa tassa e' "<<tassa<<" euro\nIn totale bisogna pagare "<<importo+tassa<<" euro\n";

	//ferma il programma finchè non si preme il tasto
	system("PAUSE");

	return 0;
}
