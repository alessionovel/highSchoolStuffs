#include <iostream>

using namespace std;

int n, ind, imax, cmax, slun;
int vettm[31];
double arance[31];
double s, media, maxi;
main(){
  do {
    cout <<"Digita quanti giorni ha il mese da rilevare "<<endl;
    cin >> n;
    if ( n<28 || n>31){
      cout <<"Il mese puo' avere da 28 a 31 giorni "<<endl;
    }
  } while ((n<28) || n > 31);
  ind=0;
  while (ind < n) {
    do {
      cout << "Digita i quintali raccolti il giorno " << (ind +1) <<endl;
      cin >> arance[ind];
    } while (arance[ind] < 0);
    s=s+arance[ind];
    ind++;
  }
  media=s/n;
  cout <<"Nel mese rilevato si sono raccolti "<< s << " quintali di arance" << "con un raccolto medio giornaliero di " << media << " quintali"<<endl;
  maxi=arance[0];
  for(ind=0; ind<n; ind++) {
    if (arance[ind] > maxi) {
      maxi= arance[ind];
      imax=ind;
    }
  }
  cout << "Massimo quantitativo di arance raccolto "<< maxi;
  cmax=0;
  for(ind=0; ind<n; ind++) {
    if (arance[ind] == maxi) {
    vettm[cmax]=ind;
    cmax=cmax+1;
    }
  }
  if (cmax>1) {
  cout<<" che e' stato fatto nei giorni "<< (vettm[0] +1);
    for (ind=1; ind<cmax; ind++) {
    cout <<" , "<<(vettm[ind]+1);
    }
  cout<< " "<<endl;
  } else {
    cout<<" che e' stato fatto nel giorno "<< (vettm[0]+1);
  }
  slun=0;
  ind=4;
  while (ind<n) {
    slun = slun + arance[ind];
    ind=ind+7;
  }
  cout<<"Nei lunedi' del mese si sono raccolti "<<slun <<" quintali di arance"<<endl;
}
