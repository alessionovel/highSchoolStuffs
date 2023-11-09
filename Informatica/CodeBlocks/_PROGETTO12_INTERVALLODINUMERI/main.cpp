#include <iostream>

using namespace std;

int main() {
	cout<<"Da che numero vuoi far iniziare l'intervallo?";
	int num1;
	cin>>num1;
	cout<<"Fino a che numero vuoi far arrivare l'intervallo?";
	int num2;
	cin>>num2;
	int n=num1+1;
	while (n<num2){
	cout<<n<<" ";
	n=n+1;
	}
	return 0;
}
