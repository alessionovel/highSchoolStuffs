#include <iostream>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

using namespace std;

int main() {
    cout<<"La Disney produce cartoni animati. Digitare V se consideri che questa frase sia vera, digitare F se consideri che questa frase sia falsa!/n";
	char risposta;
	cin>>risposta;


	char giusta;
    giusta=="V";
	if (risposta==giusta) {
		cout<<"Hai risposto esattamente!";
	}
	else  {
		cout"Hai sbagliato!"
	}
	system("PAUSE");
	return 0;
}
