#include<iostream>
#include <cstdlib>
using namespace std;
int main ()
{
int result = system("/usr/bin/python3 testGen1.py 1");
cout << result; 
}