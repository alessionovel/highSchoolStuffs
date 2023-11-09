#include <iostream>

using namespace std;

int main(){
  int num=-1;
  while (num<0 || num>255){
    cout<<"Inserire numero romano che si vuole convertire in numero binario: ";
    cin>>num;
  }
  if (num==0){
    cout<<"Il numero in codice binario equivale a 0";
  } else {
    while (num>0){
      if (num%2==0){
        cout<<"0";
      } else if (num%2==1) {
        cout<<"1";
      }
      num=num/2;
    }
  }
  return 0;
}
