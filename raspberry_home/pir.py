#coding=utf8
import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setup(14,GPIO.OUT)
GPIO.setup(23, GPIO.IN)
try:
    while True:
        if GPIO.input(23):
            GPIO.output(14,1)
            time.sleep(1)
            GPIO.output(14,0)
except KeyboardInterrupt:
    pass

GPIO.cleanup()
