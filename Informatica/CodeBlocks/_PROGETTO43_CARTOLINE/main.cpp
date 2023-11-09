#include <iostream>

using namespace std;

string mat[20][3];
int n, scelta;

void menu();
void aggiungi();
void cercam();
void cercad();
void cercal();
void contam();
void contad();
void ordinam();

int main(){
  cout<<"Benvenuto nella gestione delle cartoline";
  do{
  menu();
  aggiungi();
  cercam();
  cercad();
  cercal();
  contam();
  contad();
  ordinam();
  }while (scelta!=8);
  cout<<"\nGrazie per aver usato il programma, arrivederci!\n";
  return 0;
}

void menu(){
  cout<<"\n\n1. Aggiungi una cartolina\n2. Cerca per mittente\n3. Cerca per destinatario\n4. Cerca per localita'\n5. Conta cartoline inviate da un nome digitato\n6. Conta cartoline ricevute da un nome digitato\n7. Ordina i destinatari in base al mittente\n8. Esci\n\nScegli l'opzione da eseguire e inserisci il numero: ";
  cin>>scelta;
  while ((!cin) || (scelta<1) || (scelta>8)){
    cin.clear();
  	cin.ignore();
  	cout<<"Il numero inserito non è valido, inserisci un altro numero";
  	cin>>scelta;
  }
}

void aggiungi(){
  if (scelta==1){
    if (n>20){
      cout<<"Non hai piu' spazio per altre cartoline!";
    }else {
      cout<<"Inserire il nome del mittente: ";
      cin>>mat[n][0];
      cout<<"Inserire il nome del destinatario: ";
      cin>>mat[n][1];
      cout<<"Inserire la località da cui la cartolina e' stata inviata: ";
      cin>>mat[n][2];
      n++;
    }
  }
}

void cercam(){
  if (scelta==2){
    string cerca;
    int num=0;
    cout<<"Inserire il nome del mittente che si vuole cercare: ";
    cin>>cerca;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][0]){
        cout<<"\n"<<num+1<<". "<<mat[i][0]<<" ha inviato una cartolina ad "<<mat[i][1]<<" dalla citta' di "<<mat[i][2]<<"\n";
        num++;
      }
    }
    if (num==0) cout<<cerca<<" non ha inviato nessuna cartolina";
  }
}

void cercad(){
  if (scelta==3){
    string cerca;
    int num=0;
    cout<<"Inserire il nome del destinatario che si vuole cercare: ";
    cin>>cerca;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][1]){
        cout<<"\n"<<num+1<<". "<<mat[i][1]<<" ha ricevuto una cartolina da "<<mat[i][0]<<" dalla citta' di "<<mat[i][2]<<"\n";
        num++;
      }
    }
    if (num==0) cout<<cerca<<" non ha ricevuto nessuna cartolina";
  }
}

void cercal(){
  if (scelta==4){
    string cerca;
    int num=0;
    cout<<"Inserire il luogo che si vuole cercare: ";
    cin>>cerca;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][2]){
        cout<<"\n"<<num+1<<". "<<"Da "<<mat[i][2]<<" e' stata inviata una cartolina da "<<mat[i][0]<<" a "<<mat[i][1]<<"\n";
        num++;
      }
    }
    if (num==0) cout<<"Da "<<cerca<<" non e' stata inviata nessuna cartolina";
  }
}

void contam(){
  if (scelta==5){
    string cerca;
    int num=0;
    cout<<"Inserire il nome del mittente di cui si vuole sapere il numero di lettere inviate: ";
    cin>>cerca;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][0]){
        num++;
      }
    }
    if (num==0){
      cout<<cerca<<" non ha inviato nessuna cartolina";
    }else{
      cout<<cerca<<" ha inviato "<<num<<" cartoline";
    }
  }
}

void contad(){
  if (scelta==6){
    string cerca;
    int num=0;
    cout<<"Inserire il nome del destinatario di cui si vuole sapere il numero di lettere ricevute: ";
    cin>>cerca;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][1]){
        num++;
      }
    }
    if (num==0){
      cout<<cerca<<" non ha ricevuto nessuna cartolina";
    }else{
      cout<<cerca<<" ha ricevuto "<<num<<" cartoline";
    }
  }
}

void ordinam(){
  if (scelta==7){
    string cerca;
    int num=0;
    cout<<"Inserire il nome del mittente di cui si vuole ordinare i destinatari: ";
    cin>>cerca;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][0]){
        num++;
      }
    }
    string ordina[num][2];
    num=0;
    for (int i=0; i<n; i++){
      if (cerca==mat[i][0]){
        ordina[num][0]=mat[i][1];
        ordina[num][1]=mat[i][2];
        num++;
      }
    }
    string sorter;
    for (int i=0; i<num-1; i++){
      for (int j=0; j<num-i-1; j++){
        if (ordina[j][0]>ordina[j+1][0]){
          sorter=ordina[j][0];
          ordina[j][0]=ordina[j+1][0];
          ordina[j+1][0]=sorter;
          sorter=ordina[j][1];
          ordina[j][1]=ordina[j+1][1];
          ordina[j+1][1]=sorter;
        }
      }
    }
    for (int i=0;i<num;i++){
      cout<<"\nDa "<<ordina[i][0]<<" inviata dalla città di "<<ordina [i][1];
    }
  }
}
