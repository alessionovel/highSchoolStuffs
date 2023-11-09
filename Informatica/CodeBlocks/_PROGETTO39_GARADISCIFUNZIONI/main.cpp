#include <iostream>
#include <string>
using namespace std;
void inputnomi();
void numeropart();
void primamanches();
void secondamanches();
void calcoli();
void output();
int n;
double tempmin1, tempmin2, tempmintot, uno[30], due[30], tot[30];
string nomi[30];
int main(){
  numeropart();
  inputnomi();
  primamanches();
  secondamanches();
  calcoli();
  output();
  return 0;
}
void inputnomi(){
  for (int i=0;i<n;i++){
    cout<<"Inserire il nome del "<<i+1<<" partecipante: ";
    cin>>nomi[i];
    while (!cin){
    cout<<"Inserire un nome accettabile: ";
    cin.clear();
  	cin.ignore();
    cin>>nomi[i];
    }
  }
}
void numeropart(){
  cout<<"Quanti partecipanti ci sono alla gara? ";
  cin>>n;
  while (n<1 || !cin){
    cout<<"Il numero di partecipanti non puo' essere zero o negativo, inserire un altro valore: ";
    cin.clear();
  	cin.ignore();
    cin>>n;
  }
}
void primamanches(){
  for (int i=0;i<n;i++){
    cout<<"Inserire il tempo della prima manches di "<<nomi[i]<<": ";
    cin>>uno[i];
    while (uno[i]<0 || !cin){
    cout<<"Inserire un valore accettabile: ";
    cin.clear();
  	cin.ignore();
    cin>>uno[i];
    }
  }
}
void secondamanches(){
  for (int i=n-1;i>=0;i--){
    cout<<"Inserire il tempo della seconda manches di "<<nomi[i]<<": ";
    cin>>due[i];
    while (due[i]<0 || !cin){
    cout<<"Inserire un valore accettabile: ";
    cin.clear();
  	cin.ignore();
    cin>>due[i];
    }
    tot[i]=uno[i]+due[i];
  }
}
void calcoli(){
  tempmin1=uno[0];
  tempmin2=due[0];
  tempmintot=tot[0];
  for (int i=0;i<n;i++){
    if (tempmin1>uno[i]) tempmin1=uno[i];
    if (tempmin2>due[i]) tempmin2=due[i];
    if (tempmintot>tot[i]) tempmintot=tot[i];
  }
}
void output(){
  cout<<"\nEcco chi ha fatto il tempo minimo nella prima manches: ";
  for (int i=0;i<n;i++){
    if (tempmin1==uno[i]) cout<<"\n\nAtleta: "<<nomi[i]<<"\nTempo nella prima manches: "<<tempmin1<<"\nTempo totale: "<<tot[i];
  }
  cout<<"\n\n\nEcco chi ha fatto il tempo minimo nella seconda manches: ";
  for (int i=0;i<n;i++){
    if (tempmin2==due[i]) cout<<"\n\nAtleta: "<<nomi[i]<<"\nTempo nella seconda manches: "<<tempmin2<<"\nTempo totale: "<<tot[i];
  }
  cout<<"\n\n\nEd infine ecco chi ha fatto il tempo minimo totale nella gara: ";
  for (int i=0;i<n;i++){
    if (tempmintot==tot[i]) cout<<"\n\nAtleta: "<<nomi[i]<<"\nTempo totale: "<<tot[i]<<"\n";
  }
}
