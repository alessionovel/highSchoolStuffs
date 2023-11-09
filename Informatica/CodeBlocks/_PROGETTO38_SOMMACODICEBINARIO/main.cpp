#include <iostream>

using namespace std;

int main(){
  int primo[7], secondo[7], tot[8], somma, resto;
  cout<<"Inserire cifra per cifra il primo numero binario a 7 bit";
  for (int i=0;i<7;i++){
    cin>>primo[i];
    while ((primo[i]!=0) && (primo[i]!=1)){
      cin.clear();
  	  cin.ignore();
      cin>>primo[i];
    }
  }
  cout<<"Inserire cifra per cifra il secondo numero binario a 7 bit";
  for (int i=0;i<7;i++){
    cin>>secondo[i];
    while ((secondo[i]!=0) && (secondo[i]!=1)){
      cin.clear();
  	  cin.ignore();
      cin>>secondo[i];
    }
  }
  resto=0,somma=0;
  for (int i=7;i>=-1;i--){
    if (i>-1){
      somma=primo[i]+secondo[i]+resto;
      if (somma==0){
        tot[i+1]=0;
        resto=0;
      } else if (somma==1){
        tot[i+1]=1;
        resto=0;
      } else if (somma==2){
        tot[i+1]=0;
        resto=1;
      } else  if (somma==3){
        tot[i+1]=1;
        resto=1;
      }
    } else {
      somma=resto;
      if (somma==0){
          tot[i+1]=0;
          resto=0;
        } else if (somma==1){
          tot[i+1]=1;
          resto=0;
        }
      }
    }
    cout<<"Ecco il risultato: ";
    for (int i=0; i<8; i++){
      cout<<tot[i];
    }
  return 0;
}
