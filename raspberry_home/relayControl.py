#coding=utf-8
import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
GPIO.setup(17,GPIO.OUT)

#for i in range(3):

while True:
    print('off')
    #GPIO.setup(17,GPIO.IN)
    time.sleep(1)
    GPIO.output(17,0)
    time.sleep(1)
    print('on')
    #GPIO.setup(17,GPIO.OUT)
    GPIO.output(17,1)
    time.sleep(1)

GPIO.cleanup()
