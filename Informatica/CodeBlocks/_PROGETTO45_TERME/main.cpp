#include <iostream>

using namespace std;

string nome[10];
int permanenza[10][31],inpiu[10],n;

void inserimentonomi();
void inserimentodati();
int calmin(int oe,int me,int ou,int mu);
void calcoloeccesso();
void pagamenti();
void medmaxmin();

int main(){
  cout<<"Benvenuto nel centro termale!\n\n";
  inserimentonomi();
  inserimentodati();
  calcoloeccesso();
  pagamenti();
  medmaxmin();
  return 0;
}

void inserimentonomi(){
  cout<<"Quante persone fanno il forfait? ";
  cin>>n;
  for (int i=0;i<n;i++){
    cout<<"\nInserisci il nome del "<<i+1<<" iscritto: ";
    cin>>nome[i];
  }
  for (int i=0;i<n;i++){
    inpiu[i]=0;
    for (int j=0;j<31;j++){
      permanenza[i][j]=0;
    }
  }
}

void inserimentodati(){
  int gg,oe,me,ou,mu;
  for (int i=0;i<n;i++){
    cout<<"\n\nNome iscritto: "<<nome[i];
    cout<<"\nInserisci il giorno in cui e' entrato alle terme (se non e' entrato neanche una volta inserisci 0): ";
    cin>>gg;
    while (gg!=0){
      cout<<"Inserisci l'ora in cui e' entrato: ";
      cin>>oe;
      cout<<"Inserisci il minuto in cui e' entrato: ";
      cin>>me;
      cout<<"Inserisci l'ora in cui e' uscito: ";
      cin>>ou;
      cout<<"Inserisci il minuto in cui e' uscito: ";
      cin>>mu;
      while (((oe*60)+me)>((ou*60)+mu)){
        cout<<"Dati inseriti non validi!";
        cout<<"Inserisci l'ora in cui e' entrato: ";
        cin>>oe;
        cout<<"Inserisci il minuto in cui e' entrato: ";
        cin>>me;
        cout<<"Inserisci l'ora in cui e' uscito: ";
        cin>>ou;
        cout<<"Inserisci il minuto in cui e' uscito: ";
        cin>>mu;
      }
      permanenza[i][gg-1]=calmin(oe,me,ou,mu);
      cout<<"\nInserisci un altro giorno in cui l'iscritto e' entrato alle terme (se non e' piu' entrato inserisci 0): ";
      cin>>gg;
    }
  }
}

int calmin(int oe,int me,int ou,int mu){
  int ris,tote,totu;
  oe=oe*60;
  ou=ou*60;
  tote=oe+me;
  totu=ou+mu;
  ris=totu-tote;
  return ris;
}

void calcoloeccesso(){
  int tot;
  for (int i=0;i<n;i++){
    tot=0;
    for (int j=0;j<31;j++){
      tot=tot+permanenza[i][j];
    }
    if (tot>1920) inpiu[i]=tot-1920;
  }
}

void pagamenti(){
  string scambio;
  int scambio2;
  for (int i=0;i<n-1;i++){
    for (int j=0;j<n-1-i;j++){
      if (nome[j]>nome[j+1]){
        scambio=nome[j];
        nome[j]=nome[j+1];
        nome[j+1]=scambio;
        scambio2=inpiu[j];
        inpiu[j]=inpiu[j+1];
        inpiu[j+1]=scambio2;
      }
    }
  }
  cout<<"\nLista degli iscritti che devono pagare in piu':";
  for (int i=0;i<n;i++){
    cout<<"\nIscritto: "<<nome[i]<<"   Soldi ancora da pagare: "<<inpiu[i]/20;
  }
}

void medmaxmin(){
  int somma, mx, mn, med, sommatot=0;
  float media;

  for (int i=0;i<n;i++){
    somma=0;
    for (int j=0;j<31;j++){
      somma=permanenza[i][j]+somma;
    }
  sommatot=sommatot+somma;
  if (i==0){
    mx=somma;
    mn=somma;
  }else {
    if (mx<somma){
      mx=somma;
    }
    if (mn>somma){
      mn=somma;
    }
  }
  }
  media=sommatot/n;
  cout<<"\n\nLa media delle permanenze e' di "<<media<<" minuti\nLa parmanenza massima e' stata di "<<mx<<" minuti\nLa permanenza minima e' di "<<mn<<" minuti";
}
