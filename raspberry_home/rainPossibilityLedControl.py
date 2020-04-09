import RPi.GPIO as GPIO
import time
pinLow = 14
pinMid = 15
pinHig = 18

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinLow,GPIO.OUT)
GPIO.setup(pinMid,GPIO.OUT)
GPIO.setup(pinHig,GPIO.OUT)

rainPossibility = 80

if rainPossibility < 30:
    GPIO.output(pinLow,1)
    GPIO.output(pinMid,0)
    GPIO.output(pinHig,0)
    print('low')
elif rainPossibility < 60:
    GPIO.output(pinLow,0)
    GPIO.output(pinMid,1)
    GPIO.output(pinHig,0)
    print('m')
else:
    GPIO.output(pinLow,0)
    GPIO.output(pinMid,0)
    GPIO.output(pinHig,1)

    print('h')
time.sleep(4)

GPIO.cleanup()

