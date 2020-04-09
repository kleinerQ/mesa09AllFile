//: Playground - noun: a place where people can play

import UIKit

var str = "Hello, playground"

// 轉成字元陣列
let arr = Array(str)
arr[5]

// 取出特定字元
str[.init(encodedOffset: 5)]
str[str.index(str.startIndex, offsetBy: 5)]

// 取出子字串
let begin = str.index(of: "p")
let end = str.index(begin!, offsetBy: 4)
let newstr = String(str[begin!..<end])

// 是否包含關鍵字
if str.contains("play") {
    print("有包含play")
}
// 字串取代
let tmp = str.replacingOccurrences(of: "play", with: "")
print(tmp)

if str.lowercased().hasPrefix("he") {
    print("字串為He開頭")
}

if str.hasSuffix("ound") {
    print("字串為ound結尾")
}

// 取開頭五個字
str.prefix(5)
// 從尾巴取三個字
str.suffix(3)

// 字串切割
let s = "王大明,台中市文心路1號,0411111"
let list = s.split(separator: ",")
print(list[1])

// 迴圈
/*
for i in 0..<10 {
    print(i)
}

for i in 0..<10 where i % 2 == 0 {
    print(i)
}

for i in (0..<10).reversed() where i % 2 == 1 {
    print(i)
}

for i in stride(from: 0, to: 10, by: 3) {
    print(i)
}

for i in stride(from: 0, through: 10, by: 2) {
    print(i)
}

for i in stride(from: 10, through: 0, by: -1) {
    print(i)
}
*/
