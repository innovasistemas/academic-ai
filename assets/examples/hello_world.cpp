#include <iostream>
//#include <stdio.h>
//#include <stdlib.h>
//#include <string.h>
#include <math.h>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

using namespace std;


void square(int n)
{
	int i;
	double c;
	cout << "\ni \t cuadrado\n";
	for (i = 1; i <= n; i++) {
		c = pow(i, 2);
		cout << i << " \t " << c << "\n";
	}
}


int duplicate(int x)
{
	return 2 * x; 
}


void showMessage(const char* message) {
	cout << "\n" << message;
}


int main(int argc, char** argv) 
{
	char name[100], address[100], phone[100]; 
	short int age;
	
	system("Color 3");
	
	printf("\x1B[47m--- Hola, este es Lenguaje C/C++ ---\x1B[40m");
	system("Color 0");
	cout << "\nNombre: ";
	cin.getline(name, 100);

	cout << "Su nombre es: " << name;
	printf("\nSu nombre es: %s", name);
	printf("\nPrimera letra: %c", name[0]);
	cout << "\nSegunda letra: " << name[1];
	
	cout << "\n\nTel\x82 fono: ";
	cin.getline(phone, 100);
	cout << "Su tel\x82 fono es: " << phone;
	
	cout << "\n\nDirecci\xA2n: ";
	cin.getline(address, 100);
	cout << "Su direcci\xA2n es: " << address;
	
	cout << "\n\nEdad: ";
	cin >> age;
	cout << "Su edad es: " << age;
	
	if (age >= 18) {
		cout << "\nUsted es mayor de edad";
	} else {
		cout << "\nUsted es menor de edad";
	}
	
	showMessage("\nFunciones en C/C++");
	cout << "\nEdad duplicada: " << duplicate(age);
	square(10);
	
	system("pause");
		
	return 0;
}
