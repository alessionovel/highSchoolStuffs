#include <iostream>

using namespace std;

int main(){
  int i, j, cont=0, p[20], s, t1[20], t2[10], pilota1, tempo1;
  cout<<"GARA DI QUALIFICA GP";
  for (i=0; i<20; i++){
    cout<<"\nInserire il numero del pilota: ";
    cin>>p[i];
    cout<<"Inserire il suo tempo nel primo giro: ";
    cin>>t1[i];
  }
  for (i=0; i<20; i++){
    for (j=0; j<20; j++){
      if (t1[j]>t1[j+1]){
        s=t1[j];
        t1[j+1]=s;
        s=p[j+1];
        p[j]=p[j+1];
        p[j+1]=s;
      }
    }
  }
  for (i=0; i<10; i++){
    cout<<"\n\nPilota n."<<p[i];
    cout<<"\n\nInserire il suo tempo nel secondo giro: ";
    cin>>t2[i];
  }
  for (j=0; j<10; j++){
    if (t1[j]>t1[j+1]){
      s=t1[j];
      t1[j+1]=s;
      s=p[j+1];
      p[j]=p[j+1];
      p[j+1]=s;
    }
  }
  pilota1=p[0];
  tempo1=t2[0];
  for (i=0; i<10; i++){
    if(pilota1>t2[i]){
      pilota1=p[i];
      tempo1=t2[i];
    }
  }
  cout<<"\n\nIl pilota che ha vinto il secondo giro e': "<<pilota1<<".";
  cout<<"\nCon il tempo di: "<<tempo1<<".";
  return 0;
}
