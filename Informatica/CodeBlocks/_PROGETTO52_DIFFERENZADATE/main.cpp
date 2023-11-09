#include <iostream>
#include <fstream>
#include <string.h>
#include <stdlib.h>
#include <cstdlib>
#include <sstream>

using namespace std;

string data,data2;
int giorniPassati;
int DifferenzaDate(string data,string data2);
ifstream fin;

int main() {
  fin.open("date.txt");
  if(!fin){
    cout<<"Errore";
  }else{
    while(!fin.eof()){
      fin>>data;
      fin>>data2;
      giorniPassati=DifferenzaDate(data,data2);
      if(giorniPassati<0) {
        cout<<" "<<data<<" e' successivo a "<<data2<<" ";
      }else {
        cout<<"\nDal giorno "<<data<<" al giorno "<<data2<<" sono passati:"<<giorniPassati<<" giorni.\n\n";
      }
    }
  }
  fin.close();
  return 0;
}
int DifferenzaDate(string data,string data2){
  int intGG=0,intMM=0,intAA=0,i;
  string gg,mm,aa;
  int intGG2=0,intMM2=0,intAA2=0;
  string gg2,mm2,aa2;
  int mesi[13]={0,31,28,31,30,31,30,31,31,30,31,30,31};
  int sommaAnno1=0,sommaAnno2=0,sommaGGAltriAnni=0,bisestile=0;
  if(data.length() >= 10){
    gg=data.substr(0,2);
    mm=data.substr(3,2);
    aa=data.substr(6,4);
  }
  stringstream g(gg);
  g>>intGG;
  stringstream m(mm);
  m>>intMM;
  stringstream a(aa);
  a>>intAA;
  if(data2.length() >= 10){
    gg2=data2.substr(0,2);
    mm2=data2.substr(3,2);
    aa2=data2.substr(6,4);
  }
  stringstream g2(gg2);
  g2>>intGG2;
  stringstream m2(mm2);
  m2>>intMM2;
  stringstream a2(aa2);
  a2>>intAA2;
  for(i=intAA;i<intAA2;i++){
    if(i%4==0){
      if(i%100!=0 ){
        bisestile++;
      }else if(i%400==0)
      bisestile++;
    }
  }
  if(intAA2%4==0){
    if(intAA2%100!=0 ){
      bisestile++;
    }else if(intAA2%400==0)
    bisestile++;
  }
  for(i=1;i<intMM;i++){
    sommaAnno1=sommaAnno1+mesi[i];
  }
  int DiffAnno1=365-(sommaAnno1+intGG);
  for(i=1;i<intMM2;i++){
     sommaAnno2=sommaAnno2+mesi[i];
  }
  int DiffAnno2=sommaAnno2+intGG2;
  sommaGGAltriAnni=((intAA2-intAA)-1)*365;
  return DiffAnno1+DiffAnno2+sommaGGAltriAnni+bisestile; }
