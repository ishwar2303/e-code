#include <iostream>
using namespace std;
#define variableName(x) #x
int main(){
    string str;
    cin >> str;
    cout << variableName(str);

	return 0;

}