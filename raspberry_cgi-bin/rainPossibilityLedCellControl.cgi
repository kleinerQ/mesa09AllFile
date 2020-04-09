#!/usr/bin/python2.7-cgi

#coding=utf-8


import RPi.GPIO as GPIO
import time
import cgi

print("Content-type:text/html")
print("")


pinLow = 14
pinMid = 15
pinHig = 18

form = cgi.FieldStorage()


rainPossibility = int(form.getvalue("rainPossibility"))

if rainPossibility is not None:

    GPIO.setmode(GPIO.BCM)
    GPIO.setup(pinLow,GPIO.OUT)
    GPIO.setup(pinMid,GPIO.OUT)
    GPIO.setup(pinHig,GPIO.OUT)


    if rainPossibility < 30:
        GPIO.output(pinLow,1)
        GPIO.output(pinMid,0)
        GPIO.output(pinHig,0)
        print('low')
    elif rainPossibility < 60:
        GPIO.output(pinLow,0)
        GPIO.output(pinMid,1)
        GPIO.output(pinHig,0)
        print('m')
    else:
        GPIO.output(pinLow,0)
        GPIO.output(pinMid,0)
        GPIO.output(pinHig,1)

        print('h')
    
    time.sleep(4)

else:

    print("No Data")

GPIO.cleanup()

