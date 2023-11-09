#include <iostream>
#include <time.h>
#include <stdlib.h>

using namespace std;

int mat[64][64],n,i,j,k,l,r=0,vet[64],uno=0,zero=0,conta=1;

void assegna();
void dividi();

int main(){
  assegna();
  dividi();
  return 0;
}

void assegna(){
  int r;
  srand(time(NULL));
  cout<<"Inserisci la percentuale con cui vuoi che escano numeri 0: ";
  cin>>n;
  for(i=0;i<64;i++){
    for(j=0;j<64;j++){
      r=rand()%100;
      if(r<n){
        mat[i][j]=0;
      }else{
        mat[i][j]=1;
      }
    }
  }
  for(i=0;i<64;i++){
    cout<<"\n";
    for(j=0;j<64;j++){
      cout<<mat[i][j]<<" ";
    }
  }
}

void dividi(){
  int tot;
  for(i=0;i<64;i=i+8){
    for(j=0;j<64;j=j+8){
      r=0;
      k=i;
      l=j;
      cout<<"\n\n\n";
      vet[r]=mat[k][l];
      r++;
      tot=0;
      while (tot<7){
        if(k==i){
          l++;
          vet[r]=mat[k][l];
          r++;
          while(l!=j){
            k++;
            l--;
            vet[r]=mat[k][l];
            r++;
          }
        }else if (l==j) {
          k++;
          vet[r]=mat[k][l];
          r++;
          while(k!=i){
            k--;
            l++;
            vet[r]=mat[k][l];
            r++;
          }
        }
        tot++;
      }
      tot=0;
      cout<<" ";
      while (tot<6){
        if(k==i+7){
          l++;
          vet[r]=mat[k][l];
          r++;
          while(l!=j+7){
            k--;
            l++;
            vet[r]=mat[k][l];
            r++;
          }
        }else if (l==j+7) {
          k++;
          vet[r]=mat[k][l];
          r++;
          while(k!=i+7){
            k++;
            l--;
            vet[r]=mat[k][l];
            r++;
          }
        }
        tot++;
      }
      vet[r]=mat[i+7][j+7];
      r++;
      for (int d=0;d<64;d++){
        cout<<vet[d];
      }
      for (int g=0;g<63;g++){
        if (vet[g+1]==vet[g]){
          conta++;
          if (g==62){
            cout<<conta;
            conta=1;
          }
        }else{
          cout<<conta<<" ";;
          conta=1;
        }
      }
    }
  }
}
