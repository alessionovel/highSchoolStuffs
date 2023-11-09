#include <iostream>
#include <string>

using namespace std;

int main(){
  int giorno, mese, anno, feb;
  bool err=true;
  while (err==true){
    err=false;
    cout<<"Inserire il giorno nel seguente formato (GG): ";
    cin>>giorno;
    cout<<"Inserire il mese nel seguente formato (MM): ";
    cin>>mese;
    cout<<"Inserire l'anno nel seguente formato (AAAA): ";
    cin>>anno;
    if (anno%4==0){
      if (anno%100==0){
        if (anno%400==0){
          feb=29;
        }else{
          feb=28;
        }
      } else{
        feb=29;
      }
    }else{
      feb=28;
    }
    if ((mese<1) || (mese>12)){
      err=true;
    }
    if ((mese==1) || (mese==3) || (mese==5) || (mese==7) || (mese==8) || (mese==10) || (mese==12)){
      if ((giorno<1) || (giorno>31)){
        err=true;
      }
    }else if (mese==2){
      if ((giorno<1) || (giorno>feb)){
        err=true;
      }
    }else{
      if ((giorno<1) || (giorno>30)){
        err=true;
      }
    }
  }
  cout<<"La data inserita e' corretta ed equivale ad: "<<giorno<<"/"<<mese<<"/"<<anno;
  return 0;
}
