#!/usr/bin/python2.7-cgi
#coding=utf-8
import RPi.GPIO as GPIO
import time
pinBN = 12

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinBN,GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

print("Content-type:text/html")
print("")
ret  =  GPIO.wait_for_edge(pinBN,  GPIO.BOTH,  timeout=10000) 
if ret is None:
    #timeout
    print("0") 
else:
    #btnpress
    print("1")


GPIO.cleanup()
