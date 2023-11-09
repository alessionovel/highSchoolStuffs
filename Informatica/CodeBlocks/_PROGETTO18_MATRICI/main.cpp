#include <iostream>

using namespace std;

int main() {
	int i,n,j,m,l;
	cout<<"Inserire il numero di righe: ";
	cin>>n;
	cout<<"Inserire il numero di colonne: ";
	cin>>m;
	int mat[n][m];

	for (i=0;i<n;i++){
		for (j=0;j<m;j++){
			mat[i][j]=l;
			l++;
		}
	}

	for (i=0;i<n;i++){
		cout<<"La "<<i+1<<" riga e':";
		for (j=0;j<m;j++){
			cout<<"-"<<mat[i][j];
	    }
	    cout<<"\n";
	}
	for (j=0;j<m;j++){
		cout<<"La "<<j+1<<" colonna e':";
		for (i=0;i<n;i++){
			cout<<"-"<<mat[i][j];
	    }
	    cout<<"\n";
	}


	return 0;
}
