#include <iostream>

using namespace std;

string nomi[25];
int voti[25][10], nalu, nmat, somma;
float media[25];

void inputdati();
void inserimento();
void outputdati();

int main(){
  inputdati();
  inserimento();
  outputdati();
}

void inputdati(){
  cout<<"Quanti alunni ci sono nella classe? ";
  cin>>nalu;
  cout<<"Quante materie si studiano in questa classe? ";
  cin>>nmat;
}

void inserimento(){
  for (int i=0; i<nalu; i++){
    somma=0;
    cout<<"\n\nInserisci il cognome del "<<i+1<<" studente: ";
    cin>>nomi[i];
    cout<<"Inserire i voti di "<<nomi[i]<<": \n";
    for (int j=0; j<nmat; j++){
      cout<<"Materia numero "<<j+1<<": ";
      cin>>voti[i][j];
      somma=somma+voti[i][j];
    }
    media[i]=somma/nmat;
  }
}

void outputdati(){
  for (int i=0; i<nalu; i++){
    cout<<"\n\nAlunno: "<<nomi[i]<<"\n";
    for (int j=0; j<nmat; j++){
      cout<<"Materia numero "<<j+1<<": "<<voti[i][j]<<"\n";
    }
    cout<<"Media totale: "<<media[i];
  }
}
