#include <iostream>

using namespace std;

int main(){
  int i,giri=0, G[3];
  for (i=0;i<2;i++){
    G[i]=0;
  }
  while(giri!=-1){
    cout<<"Inserire il prossimo numero (se non hai piu numeri inserisci '-1'):";
    cin>>giri;
    if (giri==-1){
    }else if (giri>G[0]){
      G[2]=G[1];
      G[1]=G[0];
      G[0]=giri;
    }else if (giri>G[1]){
      G[2]=G[1];
      G[1]=giri;
    }else if (giri>G[2]){
      G[2]=giri;
    }
  }
    cout<<"\nIl numero piu' grande e': "<<G[0]<<"\nIl secondo numero piu' grande e': "<<G[1]<<"\nIl terzo numero piu' grande e': "<<G[2];
  return 0;
}
