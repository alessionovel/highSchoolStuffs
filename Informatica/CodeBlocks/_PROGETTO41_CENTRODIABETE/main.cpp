#include <iostream>
#include <string>

using namespace std;

string nome[20], cogn[20], nsan[20], cercansan, cercanome, settimana[7], sorter;
int scelta, n=0,vmax ,vmin, scambio, dosei[20][7], valg[20][7], sommag, sommai, mediag[20], mediai[20],num;
bool errnsan, errnome;

void scelte();
void nuovop();
void cercasan();
void valorigli();
void ordinamento();

int main(){
  cout<<"Benvenuto nel raccolta dati Centro Diabetico";
  do{
    scelte();
    nuovop();
    cercasan();
    valorigli();
    ordinamento();
  }while (scelta!=5);
  return 0;
}

void scelte(){
  settimana[0]="Lunedi";
  settimana[1]="Martedi";
  settimana[2]="Mercoledi";
  settimana[3]="Giovedi";
  settimana[4]="Venerdi";
  settimana[5]="Sabato";
  settimana[6]="Domenica";
  cout<<"\n\n\n1. Nuovo paziente\n2. Cerca in base al numero sanitario\n3. Valore massimo e minimo di glicemia\n4. Ordine alfabetico di tutti i pazienti\n5. Esci\n\nInserisci il numero dell'azione che vuoi compiere: ";
  cin>>scelta;
  while ((!cin) || (scelta<1) || (scelta>5)){
    cin.clear();
  	cin.ignore();
  	cout<<"Il numero inserito non è valido, inserisci un altro numero";
  	cin>>scelta;
  }
}

void nuovop(){
  if (scelta==1){
    if (n>20) cout<<"Non hai piu' spazio per altri pazienti!";
    else {
      cout<<"Inserire il nome del nuovo paziente: ";
      cin>>nome[n];
      cout<<"Inserire il cognome di "<<nome[n]<<": ";
      cin>>cogn[n];
      cout<<"Inserire il numero della tessera sanitaria di "<<nome[n]<<" "<<cogn[n]<<": ";
      cin>>nsan[n];
      cout<<"Inserire la dose di insulina assunta giornaliera per ogni giorno della settimana: \n";
      sommai=0;
      for (int j=0;j<7;j++){
        cout<<settimana[j]<<": ";
        cin>>dosei[n][j];
        sommai=sommai+dosei[n][j];
      }
      cout<<"Inserire valore della glicemia al mattino per ogni giorno della settimana: \n";
      sommag=0;
      for (int j=0;j<7;j++){
        cout<<settimana[j]<<": ";
        cin>>valg[n][j];
        sommag=sommag+valg[n][j];
      }
      mediag[n]=sommag/7;
      mediai[n]=sommai/7;
      n++;
    }
  }
}

void cercasan(){
  if (scelta==2){
    cout<<"Inserisci il numero sanitario della persona di cui vuoi sapere i dati: ";
    cin>>cercansan;
    errnsan=true;
    for (int i=0; i<n; i++){
      if (cercansan==nsan[i]){
        cout<<"Ecco i dati di: "<<nome[i]<<" "<<cogn[i];
        cout<<"\n"<<"Insulina giornaliera: ";
        for (int j=0;j<7;j++){
          cout<<"\n"<<settimana[j]<<": ";
          cout<<dosei[i][j];
        }
        cout<<"\n"<<"Glicemia al mattino: ";
        for (int j=0;j<7;j++){
          cout<<"\n"<<settimana[j]<<": ";
          cout<<valg[i][j];
        }
        errnsan=false;
      }
    }
    if (errnsan==true){
      cout<<"Non c'e' nessuna persona registrata con questo numero sanitario!";
    }
  }
}

void valorigli(){
  if (scelta==3){
    cout<<"Inserisci il nome del paziente di cui vuoi sapere il valore minimo e quello massimo della glicemia: ";
    cin>>cercanome;
    errnome=true;
    for (int i=0; i<n; i++){
      if (cercanome==nome[i]){
        vmax=valg[i][0];
        vmin=valg[i][0];
        for (int j=1;j<7;j++){
          if (valg[i][j]>vmax){
            vmax=valg[i][j];
          }
          if (valg[i][j]<vmin){
            vmin=valg[i][j];
          }
        }
      cout<<"\nPaziente: "<<nome[i]<<" "<<cogn[i];
      cout<<"\nValore glicemia massimo: "<<vmax;
      cout<<"\nValore glicemia minimo: "<<vmin;
      errnome=false;
      }
     }
    if (errnome==true) cout<<"Non c'e' nessuna persona registrata con questo nome!";
  }
}

void ordinamento(){
  if (scelta==4){
    for(int i=0;i<n-1;i++){
      for(int j=1;j<n-i;j++){
        if(cogn[j]<cogn[j-1]){
          sorter=cogn[j];
          cogn[j]=cogn[j-1];
          cogn[j-1]=sorter;
          sorter=nome[j];
          nome[j]=nome[j-1];
          nome[j-1]=sorter;
          sorter=nsan[j];
          nsan[j]=nsan[j-1];
          nsan[j-1]=sorter;
          for (int k=0;k<7;k++){
            num=dosei[j][k];
            dosei[j][k]=dosei[j-1][k];
            dosei[j-1][k]=num;
            num=valg[j][k];
            valg[j][k]=valg[j-1][k];
            valg[j-1][k]=num;
          }
        }
      }
    }
    for (int i=0; i<n; i++){
      cout<<"\nPaziente: "<<nome[i]<<" "<<cogn[i];
      cout<<"\nValore medio glicemia: "<<mediag[i];
      cout<<"\nValore medio insulina: "<<mediai[i];
    }
  }
}
