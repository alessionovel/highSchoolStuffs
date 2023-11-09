#include <iostream>
#include <time.h>
#include <cstdlib>
#include <stdio.h>
using namespace std;
int main()
{
    int gvett,j,i,sorter;
    printf("Grandezza vettore? ");
    scanf("%d",& gvett);
    char vett[gvett];
    sorter=0;
    for(i=0;i<gvett;i++)
	    {
        printf("Inserisci una lettera: ");
        scanf("%c",& vett[i]);
        }
    cout<<"\n\n";
    for(i=0;i<gvett-1;i++){
        for(j=1;j<gvett-i;j++){
            if(vett[j]<vett[j-1]){
                sorter=vett[j];
                vett[j]=vett[j-1];
                vett[j-1]=sorter;
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
}
