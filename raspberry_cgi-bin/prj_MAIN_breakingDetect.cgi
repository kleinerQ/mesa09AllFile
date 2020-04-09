#!/usr/bin/python2.7-cgi
#coding:utf-8
import RPi.GPIO as GPIO
import time
import os
pinInfraredSensor = 14

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinInfraredSensor,GPIO.IN)
print("Content-type:text/html")
print("")
print("OK")

try:
    while True:
        if GPIO.input(pinInfraredSensor):
            print("1")
            os.system('python prj_breakingDetect.py 門口有可疑人士 1')
        else:
            print("0") 
        time.sleep(0.1)
except KeyboardInterrupt:
    pass

GPIO.cleanup()
