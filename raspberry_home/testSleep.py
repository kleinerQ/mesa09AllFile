import RPi.GPIO as GPIO

import time

GPIO.setmode(GPIO.BCM)
lockerPin = 23

GPIO.setup(23,GPIO.OUT)

GPIO.output(23,1)
time.sleep(2)
GPIO.cleanup()
