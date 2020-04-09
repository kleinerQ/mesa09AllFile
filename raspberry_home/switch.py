#coding=utf-8
import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setup(12,GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(14,GPIO.OUT)
try:
        while True:
                if GPIO.input(12):
                        print("Btn pressed")
                        GPIO.output(14,1)
                else:
                        GPIO.output(14,0)
                time.sleep(0.1)

except KeyboardInterrupt:
        pass

GPIO.cleanup()
