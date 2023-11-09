#include <iostream>
#include <string>
#include <fstream>

using namespace std;

int main(){
  string riga, nome, cognome, sesso, scuola, votoMat, votoScritto, data;
  int fine, inizio;
  ifstream fin("iscritti.txt");
  ofstream fout("colloqui.txt");
  if(!fout.is_open()){
    cout<<"Errore nella costruzione del file"<<endl;
  }else{
    if (fin.is_open()){
      while (fin>>riga){
        inizio=0;//da dove iniziare a leggere
        fine=riga.find(",");//dove finire di leggere (dove c'è la virgola
        nome=riga.substr(inizio,fine);
        inizio=inizio+fine+1;
        fine=riga.substr(inizio).find(",");
        cognome=riga.substr(inizio,fine);
        inizio=inizio+fine+1;
        fine=riga.substr(inizio).find(",");
        sesso=riga.substr(inizio,fine);
        inizio=inizio+fine+1;
        fine=riga.substr(inizio).find(",");
        scuola=riga.substr(inizio,fine);
        inizio=inizio+fine+1;
        fine=riga.substr(inizio).find(",");
        votoMat=riga.substr(inizio,fine);
        inizio=inizio+fine+1;
        fine=riga.substr(inizio).find(",");
        votoScritto=riga.substr(inizio,fine);
        inizio=inizio+fine+1;
        cout<<"Nome: "<<nome<<"\nCognome: "<<cognome<<"\nSesso: "<<sesso<<"\nScuola: "<<scuola<<"\nVoto maturita': "<<votoMat<<"\nVoto scritto: "<<votoScritto<<endl;
        if (scuola=="tecnico"){
          cout<<"\nDigita la data del colloquio"<<endl;
          cin>>data;
          riga=riga+","+data;
          riga+="\n";
          fout<<riga;
        }
      }
    }else{
      cout<<"Il file iscritti.txt non trovato: copiare il file e riavviare"<<endl;
    }
  }
  fin.close();
  fout.close();
  return 0;
}
