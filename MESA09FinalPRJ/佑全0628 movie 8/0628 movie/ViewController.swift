//
//  ViewController.swift
//  0628 movie
//
//  Created by user on 2018/6/28.
//  Copyright © 2018年 barry. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
  

    //    @IBOutlet weak var myImageView: UIImageView!

    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
//        var images = [UIImage] ()
//
//        for i in 1...5 {
//            let name = String(format: "%02d", i)
//            images.append(UIImage(named: name)!)
//        }
//        imageView.animationImages = images
//        imageView.animationDuration = 10
//        imageView.animationRepeatCount = 2
//        imageView.startAnimating()
        
        firstView.isHidden = false
        secondView.isHidden = true
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    @IBAction func indexChanged(_ sender: UISegmentedControl) {
        
        switch segmentedControl.selectedSegmentIndex
        {
         case 0:
            firstView.isHidden = false
            secondView.isHidden = true
         case 1:
            firstView.isHidden = true
            secondView.isHidden = false
        default:
            break;
        }
    }
    @IBOutlet weak var segmentedControl: UISegmentedControl!
    
    @IBOutlet weak var secondView: UIView!
    @IBOutlet weak var firstView: UIView!
//    @IBAction func mySegmentedAction(_ sender: UISegmentedControl) {
//        if sender.selectedSegmentIndex == 0 {
//            myImageView.image = UIImage(named: "01")
//
//        }else {
//            myImageView.image = UIImage(named: "02")
//        }
//    }
}

