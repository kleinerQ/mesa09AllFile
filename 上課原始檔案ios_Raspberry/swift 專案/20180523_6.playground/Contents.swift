//: Playground - noun: a place where people can play

import UIKit

var a = 10
var b = 20

// call by value => 傳值呼叫（預設）

// call by address(reference) => 傳址呼叫
func mySwap(x: inout Int, y: inout Int) {
    let tmp = x
    x = y
    y = tmp
}

print("a=\(a), b=\(b)")
//mySwap(x: a, y: b)
mySwap(x: &a, y: &b)
print("a=\(a), b=\(b)")


