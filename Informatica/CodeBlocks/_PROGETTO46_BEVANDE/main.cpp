#include <iostream>

using namespace std;

int scelta,i,j,n,matr[20][31],tot[20],maxx,minn;
string nomi[20];
double prezzo[20],totale;

void inserimentobevande();
void inserimentodati();
void totbevanda();
void preferita();
void prezzoconsumi();

int main(){
  do{
  cout<<"Scegliere un opzione:\n\n1. Inserimento nuove bevande\n2. Inserimento consumi giornalieri\n3. Calcolare il totale consumato per ogni bevanda\n4. Bevanda preferita e bevanda meno consumata\n5. Prezzo pagato per comprare tutte le bevande consumate\n6. Esci\n\n";
  cin>>scelta;
    if (scelta==1) inserimentobevande();
    if (scelta==2) inserimentodati();
    if (scelta==3) totbevanda();
    if (scelta==4) preferita();
    if (scelta==5) prezzoconsumi();
  }while (scelta!=6);
}

void inserimentobevande(){
  cout<<"Quanti tipi di bevande bisogna contare? ";
  cin>>n;
  for (i=0;i<n;i++){
    cout<<"Inserire il nome della "<<i+1<<" bevanda: ";
    cin>>nomi[i];
    cout<<"Inserire il prezzo singolo di una bottiglia di "<<nomi[i]<<": ";
    cin>>prezzo[i];
  }
}

void inserimentodati(){
  int somma;
  cout<<"Inserimento quantità bottiglie consumate per giorno";
  for (i=0;i<n;i++){
    somma=0;
    cout<<"Bevanda: "<<nomi[i];
    for (j=0;j<31;j++){
      cout<<"Giorno "<<j+1<<": ";
      cin>>matr[i][j];
      somma=somma+matr[i][j];
    }
    tot[i]=somma;
  }
}

void totbevanda(){
  cout<<"Bottiglie consumate per ogni bevanda: ";
  for(i=0;i<n;i++){
    cout<<nomi[i]<<": "<<tot[i]<<" bottiglie";
    if (i==0){
      maxx=tot[i];
      minn=tot[i];
    }else{
      if (tot[i]>maxx) maxx=tot[i];
      if (tot[i]<minn) minn=tot[i];
    }
  }
}

void preferita(){
  for (i=0;i<n;i++){
    if (tot[i]==maxx) cout<<"La bevanda preferita e' "<<nomi[i];
    if (tot[i]==minn) cout<<"La bevanda meno piaciuta e' "<<nomi[i];
  }
}

void prezzoconsumi(){
  totale=0;
  for (i=0;i<n;i++){
    totale=totale+(prezzo[i]*tot[i]);
  }
  cout<<"Il prezzo totale e' di "<<totale;
}
