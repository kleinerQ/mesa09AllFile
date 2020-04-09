//: Playground - noun: a place where people can play

import UIKit

/*
func myPring(外部看的到 內部使用的: String) {
    print(內部使用的)
    print(內部使用的)
    print(內部使用的)
}

myPring(外部看的到: "hello")


// 名字是：addTwoValuesAndPrint(x:y:)
func addTwoValuesAndPrint(x v1: Int, y v2: Int) {
    print(v1 + v2)
}

// 名字是 addTwoValuesWith(firstValue:andSecondValue:)
func addTwoValuesWith(firstValue x: Int, andSecondValue y: Int) {
    print(x + y)
}

addTwoValuesAndPrint(x: 10, y: 20)
addTwoValuesWith(firstValue: 10, andSecondValue: 20)


func addTwoValues(_ x: Int, _ y: Int) {
    print(x + y)
}
addTwoValues(5, 3)

func addTwoValues1(x: Int, y: Int) {
    print(x + y)
}
addTwoValues1(x: 3, y: 4)
*/
//////////////////////////////////////////////////////////////////////////////

func addTwoValues(x: Int, y: Int) -> Int {
    return x + y
}
let ans = addTwoValues(x: 4, y: 3)

func divide(x: Float, y: Float) -> Float? {
    guard y != 0 else {
        return nil
    }
    
    return x / y
}

if let ans = divide(x: 5, y: 0) {
    print("答案為 \(ans)")
} else {
    print("運算錯誤，建議檢查分母是否為零")
}

///////////////////////////////////////////////////////////////
// 參數預設值
func myPower(value: Decimal, power: Int = 2) -> Decimal {
    return pow(value, power)
}
myPower(value: 10)
myPower(value: 10, power: 3)

///////////////////////////////////////////////////////////////
// 動態參數數量
func mySum(_ arr: Int...) -> Int {
    var sum = 0
    for n in arr {
        sum += n
    }
    return sum
}

print(mySum(1, 2, 5))
print(mySum(6, 7))
print(mySum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10))







