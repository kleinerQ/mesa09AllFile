#coding=utf-8
import RPi.GPIO as GPIO
import time
pinBN = 12
GPIO.setmode(GPIO.BCM)
GPIO.setup(pinBN,GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

ret  =  GPIO.wait_for_edge(pinBN,  GPIO.BOTH,  timeout=5000) 
if ret is None:
   print("timeOut") 
else:
   print("btn pressed")


GPIO.cleanup()
