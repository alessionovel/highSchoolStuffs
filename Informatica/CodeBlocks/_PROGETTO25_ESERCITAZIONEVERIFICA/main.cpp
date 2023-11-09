#include <iostream>
#include <time.h>

#include <cstdlib>

#include<stdio.h>


using namespace std;


int main()

{

 int n;

 do{

 printf("Inserire lunghezza vettore(max 7): ");

 scanf("%d", & n);

 }while(n>7);


 int numeri[n],i,j,swa;

 char lettere[n];



   srand((unsigned)time(NULL));

   for(i=0;i<n;i++){

   numeri[i]=97+(rand()% 26);

   }

   printf(" I TUOI NUMERI: ");

   for(i=0;i<n;i++){

   printf("%d",numeri[i]);

   printf(" ");

   }

   printf(" ");


   for(i=0;i<n;i++){

   lettere[i]=numeri[i];

   }
