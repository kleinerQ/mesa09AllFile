//: Playground - noun: a place where people can play

import UIKit

var arr = [1, 3, 5, 2, 4]

// 順向排序
arr.sorted()
// 逆向排序
arr.sorted(by: >)
print("hello")

// 反置
let x = arr.reversed()
x.forEach { (element) in
    print(element)  // [4, 2, 5, 3, 1]
}

// 檢查是否包含特定元素
arr.contains(5)
arr.contains(10)

// 索引值 1 跟 3 對調
arr.swapAt(1, 3)

arr.first // arr[0]
arr.last  // arr[arr.count - 1]

arr.count
// 陣列越界
//arr[10]

