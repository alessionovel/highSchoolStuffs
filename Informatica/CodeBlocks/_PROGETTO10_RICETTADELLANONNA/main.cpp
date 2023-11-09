#include <iostream>

using namespace std;

int main() {
	cout<<"Ciao nonna! Come si chiama la tua ricetta? ";
	string ricetta;
	cin>>ricetta;

	cout<<"\nInserire il nome del primo ingrediente: ";
	string ing1;
	cin>>ing1;
	cout<<"\nInserire il nome del secondo ingrediente: ";
	string ing2;
	cin>>ing2;
	cout<<"\nInserire il nome del terzo ingrediente: ";
	string ing3;
	cin>>ing3;

	cout<<"\nQuanti euro puoi spendere?";
	float budget;
	cin>>budget;

	cout<<"\nQuanto euro costa "<<ing1<<"?";
	float prezzo1;
	cin>>prezzo1;
	cout<<"\nQuanto euro costa "<<ing2<<"?";
	float prezzo2;
	cin>>prezzo2;
	cout<<"\nQuanto euro costa "<<ing3<<"?";
	float prezzo3;
	cin>>prezzo3;

	float totale;
	totale=prezzo1+prezzo2+prezzo3;
	cout<<"\nIn totale sono "<<totale<<" euro!";

	if (totale<=budget) cout<<"\nPerfetto. I soldi sono sufficienti, la ricetta si può fare!";
	else {
		cout<<"\nI soldi sono insufficienti, scegli un ingrediente da eliminare.\nInserire 1 per eliminare "<<ing1<<"! \nAltrimenti inserire 2 per eliminare "<<ing2<<"! \nO inserire 3 per eliminare "<<ing3<<"!";
		int eliminato;
		cin>>eliminato;
		float rimanente;
		if (eliminato==1) {
			cout<<"\nAdesso gli ingredienti sono "<< ing2<<" e "<<ing3<<"!";
			rimanente=prezzo2+prezzo3;
			if (rimanente<=budget) cout<<"\nAdesso i soldi bastano per fare la ricetta";
			else cout<<"\nI soldi non bastano ancora, cambiare ricetta!";
			}
		else if (eliminato==2) {
			cout<<"\nAdesso gli ingredienti sono "<< ing1<<" e "<<ing3<<"!";
			rimanente=prezzo1+prezzo3;
			if (rimanente<=budget) cout<<"\nAdesso i soldi bastano per fare la ricetta";
			else cout<<"I soldi non bastano ancora, cambiare ricetta!";
			}
		else if (eliminato==3) {
			cout<<"\nAdesso gli ingredienti sono "<< ing1<<" e "<<ing2<<"!";
			rimanente=prezzo1+prezzo2;
			if (rimanente<=budget) cout<<"\nAdesso i soldi sono sufficienti per fare la ricetta";
			else cout<<"\nI soldi non bastano ancora, cambiare ricetta!";
			}
		}


	return 0;
}
