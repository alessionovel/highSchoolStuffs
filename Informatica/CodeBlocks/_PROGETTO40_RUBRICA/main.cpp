#include <iostream>

using namespace std;

string nome[20], ntel[20], cercanome, cercanumero;
int scelta, n=0;
bool errnome,errnum;

void scelte();
void nuovoc();
void cercanomi();
void cercanumeri();

int main(){
  cout<<"Benvenuto nella rubrica";
  do{
    scelte();
    nuovoc();
    cercanomi();
    cercanumeri();
  }while (scelta!=4);
  return 0;
}

void scelte(){
  cout<<"\n\n\n1. Crea nuovo contatto\n2. Cerca contatto\n3. Cerca numero\n4. Esci\n\nInserisci il numero dell'azione che vuoi compiere: ";
  cin>>scelta;
  while ((!cin) || (scelta<1) || (scelta>4)){
    cin.clear();
  	cin.ignore();
  	cout<<"Il numero inserito non è valido, inserisci un altro numero";
  	cin>>scelta;
  }
}

void nuovoc(){
  if (scelta==1){
    if (n>20) cout<<"Non hai piu' spazio per altri numeri!";
    else {
      cout<<"Inserire il nome del nuovo contatto: ";
      cin>>nome[n];
      cout<<"Inserire il numero di telefono di "<<nome[n]<<": ";
      cin>>ntel[n];
      n++;
    }
  }
}

void cercanomi (){
  if (scelta==2){
    cout<<"Inserisci il nome di cui vuoi sapere il numero: ";
    cin>>cercanome;
    errnome=true;
    for (int i=0; i<n; i++){
      if (cercanome==nome[i]){
        cout<<"Il numero di telefono e': "<<ntel[i];
        errnome=false;
      }
    }
    if (errnome=true) cout<<"Non c'e' nessun contatto con questo nome!";
  }
}

void cercanumeri(){
  if (scelta==3){
    cout<<"Inserisci il numero di cui vuoi sapere il nome: ";
    cin>>cercanumero;
    errnum=true;
    for (int i=0; i<n; i++){
      if (cercanumero==ntel[i]){
        cout<<"Il numero di telefono e' di: "<<nome[i];
        errnum=false;
      }
    }
    if (errnum=true) cout<<"Non c'e' nessun contatto con questo numero!";
  }
}
