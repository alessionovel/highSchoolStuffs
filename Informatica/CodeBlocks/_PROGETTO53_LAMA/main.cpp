#include <iostream>
#include <fstream>
#include <cstdlib>
#include <sstream>
#include <string.h>
#include <stdlib.h>

using namespace std;

string coord;
int distanza;
int calcolo(string tot);
ifstream fin;
ofstream fout;

int main(){
  fin.open("input.txt");
  fout.open("output.txt");
  if(!fin){
    cout<<"Errore";
  }else{
    while(!fin.eof()){
      fin>>coord;
      distanza=calcolo(coord);
      fout<<distanza<<endl;
    }
  }
  fin.close();
  fout.close();
  return 0;
}

int calcolo(string tot){
  int x=0,y=0,ris;
  string spost;
  char spost1;
  for (int i=0;i<tot.size();i++){
    spost=tot.substr(i,1);
    stringstream g(spost);
    g>>spost1;
    if (spost1=='N')y++;
    if (spost1=='S')y--;
    if (spost1=='E')x++;
    if (spost1=='O')x--;
  }
  ris=(x*x)+(y*y);
  return ris;
}
