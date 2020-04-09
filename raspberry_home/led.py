import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
GPIO.setup(14,GPIO.OUT)
#GPIO.output(14,1)
i = 0
for i in range(3):
        GPIO.output(14,1)
        time.sleep(2)
        GPIO.output(14,0)
        time.sleep(2)

"""

while 1 :
        GPIO.output(14,1)
        time.sleep(2)
        GPIO.output(14,0)
"""
GPIO.cleanup()



