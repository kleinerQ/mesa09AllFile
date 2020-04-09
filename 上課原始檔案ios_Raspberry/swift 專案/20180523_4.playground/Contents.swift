//: Playground - noun: a place where people can play

import UIKit

var t: (x: Int, y: Int) = (x: 10, y: 20)

print(t.0)
print(t.1)

t.0 = 30
print(t.0)

print(t.x)

var a = 10
var b = 20

print("a=\(a), b=\(b)")
(a, b) = (b, a)
print("a=\(a), b=\(b)")



