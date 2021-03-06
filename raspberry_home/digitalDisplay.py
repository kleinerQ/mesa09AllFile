import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)

pinEnable = 14
pinDS = 17
pinSTCP = 27
pinSHCP = 22

GPIO.setup(pinEnable,  GPIO.OUT)
GPIO.setup(pinDS,  GPIO.OUT)
GPIO.setup(pinSTCP,  GPIO.OUT)
GPIO.setup(pinSHCP,  GPIO.OUT)
GPIO.output(pinEnable,1)
data = [
        #A B C D E F G GP
       # [0,1,1,0,0,0,0,1,1,1,0,1,1,0,1,1], #1
        [1,1,0,1,1,0,1,1], #2
        [1,1,1,1,0,0,1,1], #3
        [0,1,1,0,0,1,1,1], #4
        [1,0,1,1,0,1,1,1], #5
        [0,0,1,1,1,1,1,1], #6
        [1,1,1,0,0,0,0,1], #7
        [1,1,1,1,1,1,1,1], #8
        [1,1,1,0,0,1,1,1], #9
        [1,1,1,1,1,1,0,1], #0


        ]

try:
    for i in range(len(data)):
        GPIO.output(pinSTCP,0)
        for j in range(len(data[i])):
            GPIO.output(pinSHCP, 0)
            GPIO.output(pinDS, data[i][j])
            GPIO.output(pinSHCP, 1)
        GPIO.output(pinSTCP, 1)

        time.sleep(1)
except KeyboardInterrupt:
    pass


time.sleep(10)
GPIO.cleanup()

