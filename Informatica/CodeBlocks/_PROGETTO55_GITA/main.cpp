#include <iostream>
#include <string>
#include <fstream>

void menu();
void mostrapartecipanti();
void addpart();
void delpart();
void nuovobus();
void ordinaattesa();
void salvataggio();

using namespace std;

int scelta,iprimo=0,isecondo=0,iattesa=0;
string primo[54], secondo[54], attesa[100];
bool oksecondo=false;

ifstream fin;
ofstream fout;

int main(){
  fin.open("primo.txt");
  int i=0;
  while(!fin.eof()){
    fin>>primo[i];
    if (primo[i]!=""){
    iprimo++;
    i++;
    }
  }
  fin.close();
  fin.open("secondo.txt");
  i=0;
  while(!fin.eof()){
    fin>>secondo[i];
    if (secondo[i]!=""){
    isecondo++;
    i++;
    }
  }
  fin.close();
  fin.open("attesa.txt");
  i=0;
  while(!fin.eof()){
    fin>>attesa[i];
    if (attesa[i]!=""){
    iattesa++;
    i++;
    }
  }
  fin.close();
  do{
  menu();
  if(scelta==0){
    mostrapartecipanti();
  }
  if(scelta==1){
    addpart();
  }
  if(scelta==2){
    delpart();
  }
  if(scelta==3){
    nuovobus();
  }
  }while(scelta!=4);
  salvataggio();
  return 0;

}

void menu(){
  cout<<"0. Mostra partecipanti\n1. Aggiungi partecipante\n2. Elimina partecipante\n3. Nuovo bus\n4. Esci\n\nScelta: ";
  cin>>scelta;
  while (scelta<0 || scelta>5){
    cout<<"\nErrore, reinserire il numero: ";
    cin>>scelta;
  }
}

void mostrapartecipanti(){
  cout<<"\nPRIMO BUS";
  for (int i=0;i<iprimo;i++){
    cout<<"\n"<<i+1<<". "<<primo[i];
  }
  cout<<"\nSECONDO BUS";
  for (int i=0;i<isecondo;i++){
    cout<<"\n"<<i+1<<". "<<secondo[i];
  }
  cout<<"\nLISTA ATTESA";
  for (int i=0;i<iattesa;i++){
    cout<<"\n"<<i+1<<". "<<attesa[i];
  }
  cout<<"\n\n";
}

void addpart(){
  string nome;
  cout<<"Inserisci il codice fiscale del partecipante: ";
  if (iprimo<54){
    cin>>primo[iprimo];
    iprimo++;
  }else{
    if (oksecondo=true){
    if (isecondo<54){
      cin>>secondo[isecondo];
      isecondo++;
    }else{
      cin>>attesa[iattesa];
      iattesa++;
    }
    }else{
      cin>>attesa[iattesa];
      iattesa++;
    }
  }
}

void delpart(){
  string elimina;
  cout<<"Inserisci il codice fiscale del partecipante che vuoi eliminare: ";
  cin>>elimina;
  for (int i=0;i<iprimo;i++){
    if (primo[i]==elimina){
      primo[i]=primo[iprimo];
      primo[iprimo]=attesa[0];
      ordinaattesa();
    }
  }
  for (int i=0;i<isecondo;i++){
    if (secondo[i]==elimina){
      secondo[i]=secondo[isecondo];
      secondo[isecondo]=attesa[0];
      ordinaattesa();
    }
  }
}

void nuovobus(){
  oksecondo=true;
  int i=0;
  while (i<54 || i<iattesa){
    secondo[i]=attesa[i];
    isecondo++;
    i++;
  }
}

void ordinaattesa(){
  for (int i=0;i<iattesa;i++){
    attesa[i]=attesa[i+1];
  }
  iattesa--;
}

void salvataggio(){
  fout.open("primo.txt");
  for(int i=0;i<iprimo;i++){
    fout<<primo[i]<<" ";
  }
  fout.close();
  fout.open("secondo.txt");
  for(int i=0;i<isecondo;i++){
    fout<<secondo[i]<<" ";
  }
  fout.close();
  fout.open("attesa.txt");
  for(int i=0;i<iattesa;i++){
    fout<<attesa[i]<<" ";
  }
  fout.close();
}
