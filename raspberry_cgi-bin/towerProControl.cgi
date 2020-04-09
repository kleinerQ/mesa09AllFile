#!/usr/bin/python2.7-cgi
#coding=utf-8
import  cgi
import  RPi.GPIO  as  GPIO  
import  time

form = cgi.FieldStorage()
degree = form.getvalue("degree")


print("Content-type:text/html")
print("")
print("OK")


def degreeToDutyCycleAndMove(degree):
     dc = ( 12 - 2.5 ) / 180 * degree + 2.5
     p.ChangeDutyCycle(dc)
     time.sleep(0.7)



pinSR = 25
GPIO.setmode(GPIO.BCM)
GPIO.setup(pinSR,GPIO.OUT)
p = GPIO.PWM(pinSR, 50)
p.start(0)
stepDegree = 5

degreeToDutyCycleAndMove(int(degree))



p.stop()
GPIO.cleanup()


