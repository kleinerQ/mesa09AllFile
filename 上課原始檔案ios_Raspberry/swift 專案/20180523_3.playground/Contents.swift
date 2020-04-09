//: Playground - noun: a place where people can play

import UIKit

/*
var arr = [String]()
arr.append("A")
arr.append("B")
*/

var arr: [[String: String]] = []

//print(arr.count)

arr.append(["姓名": "王大明", "住址": "台中市文心路1號", "電話": "041111"])
arr.append(["姓名": "李大媽", "住址": "台中市公益路100號", "電話": "042222"])
arr.append(["姓名": "王小毛", "住址": "台中市英才路10號", "電話": "043333"])

print(arr[1]["住址"])

for p in arr {
    if p["姓名"] == "李大媽" {
        print(p["電話"])
        break
    }
}

