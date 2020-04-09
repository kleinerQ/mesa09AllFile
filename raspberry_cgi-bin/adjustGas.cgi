#coding=utf8
import RPi.GPIO as GPIO
import time
pinBN = 2

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinBN,GPIO.IN)


try:
    while True:
        print(GPIO.input(pinBN))
        time.sleep(0.1)

except KeyboardInterrupt:
    pass

GPIO.cleanup()
