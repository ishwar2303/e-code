#include <iostream>
using namespace std;

int conversion(string str, int k){
    int i, count = 0;
    for(i=1; i<str.length()/2; i++){
        if(str[i-1] != str[i+k-1])
            count++;
    }
    
    
    return count;
}

int main(){
    
    string str = "aababa";
    int k = 1;
    
    cout << "Conversion required : " << conversion(str, k);
    
    return 0;
}