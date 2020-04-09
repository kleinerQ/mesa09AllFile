#!/usr/bin/python2.7-cgi

#coding=utf-8

import cgi
import RPi.GPIO as GPIO


form = cgi.FieldStorage()
#pinSwitch = form.getvalue("pin")
isOn = form.getvalue("isOn")
pinSwitch = 14
if isOn == '1':
    GPIO.output(pinSwitch, GPIO.HIGH)
else if isOn == '0':
    GPIO.output(pinSwitch, GPIO.LOW)
else:
    pass
