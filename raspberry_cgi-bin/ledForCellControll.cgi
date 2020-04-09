#!/usr/bin/python2.7-cgi

#coding=utf-8

import cgi 
import RPi.GPIO as GPIO



form = cgi.FieldStorage()
pinLed = form.getvalue("pin")
isOn = form.getvalue("isOn")

if pinLed is None:
    pinLed = "14"

if isOn is None:
    isOn = "0"


pinLED = int(pinLed)
isOn = int(isOn)




GPIO.setmode(GPIO.BCM)
GPIO.setup(pinLED,GPIO.OUT)
GPIO.output(pinLED,isOn)


print("Content-type:text/html")
print("")
print("OK")
