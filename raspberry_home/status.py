#!/usr/bin/python2.7-cgi

#coding=utf-8

import cgi
import RPi.GPIO as GPIO


pinSwitch = 14
if GPIO.input(pinSwitch):
    print('1')
else:
    print('0')
