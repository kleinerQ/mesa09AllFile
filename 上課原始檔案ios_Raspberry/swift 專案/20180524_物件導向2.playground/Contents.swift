//: Playground - noun: a place where people can play

import UIKit

class 人: NSObject {
    private var 頭髮顏色 = "黑色"
    
    func 設定頭髮顏色(_ 顏色: String) -> Bool {
        if 顏色 == "紅色" || 顏色 == "黑色" || 顏色 == "白色" {
            頭髮顏色 = 顏色
            return true
        }
        
        return false
    }
    
    func 取得頭髮顏色() -> String {
        return 頭髮顏色
    }
}

class 車子: NSObject {
    var 駕駛: 人? = nil
}

//////////////////////////////////////////

class 新人類: 人 {
    private var 年齡: Int = 1
    
    func 設定年齡(_ 年齡: Int) -> Bool {
        if 年齡 > 0 {
            self.年齡 = 年齡
            return true
        }
        
        return false
    }
    
    func 取得年齡() -> Int {
        return 年齡
    }
}



let 王大明 = 人()
let 李大媽 = 人()

if 王大明.設定頭髮顏色("白色") {
    print("設定成功")
} else {
    print("請不要亂染髮")
}

print(王大明.取得頭髮顏色())



let 王小毛 = 新人類()
王小毛.設定頭髮顏色("紅色")
王小毛.設定年齡(18)
print(王小毛.取得年齡())

let car1 = 車子()
car1.駕駛 = 王大明

let car2 = 車子()
car2.駕駛 = 王小毛

print((car2.駕駛 as! 新人類).取得年齡())
