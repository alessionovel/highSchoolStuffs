#include <iostream>
#include <math.h>
#include <stdio.h>

using namespace std;

int main(){
  float a,b,c,x,x1,x2,radice,delta;
  cout<<"Inserisci il coefficiente 'a' dell'equazione: ";
  cin>>a;
  cout<<"Inserisci il coefficiente 'b' dell'equazione: ";
  cin>>b;
  cout<<"Inserisci il coefficiente 'c' dell'equazione: ";
  cin>>c;
  if (a==0){
    x=-c/b;
    cout<<"X equivale a: "<<x;
  }
  else if (a!=0){
    delta=(b*b)-(4*a*c);
    if (delta<0){
      cout<<"L'equazione non ha soluzioni in R";
    }
    else if (delta==0){
      x=-b/(2*a);
      cout<<"X equivale a: "<<x;
    }
    else if (delta>0){
      radice = sqrt(delta);
      x1=(-b+radice)/(2*a);
      x2=(-b-radice)/(2*a);
      cout<<"X1 equivale a: "<<x1<<"\n";
      cout<<"X2 equivale a: "<<x2;
      }
  }
  return 0;
}
