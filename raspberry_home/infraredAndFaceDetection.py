import RPi.GPIO as GPIO
import time
import os
pinInfraredSensor = 14

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinInfraredSensor,GPIO.IN)


try:
    while True:
        if GPIO.input(pinInfraredSensor):
            print("1")
            os.system('python prj_faceDetectStreaming.py thief 1')
        else:
            print("0") 
        time.sleep(0.1)
except KeyboardInterrupt:
    pass

GPIO.cleanup()

