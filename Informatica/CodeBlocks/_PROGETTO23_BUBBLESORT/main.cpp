#include <iostream>
#include <time.h>
#include <cstdlib>
using namespace std;
int main()
{
    int gvett,j,i,sorter;
    srand(time(NULL));
    cout<<"Grandezza vettore? ";
    cin>>gvett;
    int vett[gvett];
    sorter=0;
    for(i=0;i<gvett;i++){
        vett[i]=rand()%100+1;
        cout<<vett[i]<<" ";
    }
    cout<<"\n\n";
    for(i=0;i<gvett-1;i++){
        for(j=0;j<gvett-i-1;j++){
            if(vett[j]>vett[j+1]){
                sorter=vett[j];
                vett[j]=vett[j+1];
                vett[j+1]=sorter;
                }
        }
        for(j=0;j<gvett;j++){
            cout<<vett[j]<<" ";
                            }
        cout<<"\n";
    }
    cout<<"\n";
    for(i=0;i<gvett;i++){
        cout<<vett[i]<<" ";
    }
return 0;
}
