#!/usr/bin/python2.7-cgi
#coding=utf-8
import RPi.GPIO as GPIO
import time
pinBN = 2

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinBN,GPIO.IN)



def  my_callback(channel):
    GPIO.remove_event_detect(channel)
    print("Gas")

    if not GPIO.input(channel):
        print("alert")
    else:
        print("safe")
    
    GPIO.add_event_detect(channel,  GPIO.BOTH,  callback=my_callback, bouncetime=500)

    pass



print("Content-type:text/html")
print("")

try:
    GPIO.add_event_detect(pinBN,  GPIO.BOTH,  callback=my_callback, bouncetime=500)


    while True:
        time.sleep(1)
        pass
except KeyboardInterrupt:
    pass

GPIO.cleanup()
