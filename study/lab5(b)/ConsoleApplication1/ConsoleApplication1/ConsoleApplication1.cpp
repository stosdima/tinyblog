// ConsoleApplication1.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include <iostream>
#include "cmath"

using namespace std;
struct Politics{
	char PIB[36];
	char sex[10];
	int age;
	int fullness;
};
void Create(Politics*p)
{
	printf("Enter PIB: ");
	scanf("%s", p->PIB);
	printf("Enter sex: ");
	scanf("%d", p->sex);
	printf("Enter age: ");
	scanf("%s", p->age);
	printf("Enter fullness: ");
	scanf("%s", p->fullness);
}
void Print(Politics*p)
{
	printf("%s\n", p->PIB);
	printf("%d\n", p->sex);
	printf("%s\n", p->age);
	printf("%s\n", p->fullness);
}


int _tmain(int argc, _TCHAR* argv[])
{
	int n, i, j; Politics temp;
	printf("Enter n\n");
	scanf("%d", &n);
	Politics a[n];
	for (i = 0; i<n; i++)
		Create(&a[i]);
	for (i = 0; i<n; i++)
		Print(&a[i]);
	system("pause");
	return 0;
}


