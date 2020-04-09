import RPi.GPIO as GPIO
import time
pinMagnet = 15
GPIO.setmode(GPIO.BCM)
GPIO.setup(pinMagnet,  GPIO.IN,  pull_up_down=GPIO.PUD_UP)

try:
    while True:
        if GPIO.input(pinMagnet):
            print("None")

        else:
            print("Door Open")
        time.sleep(0.1)  
except KeyboardInterrupt:
    pass

GPIO.cleanup()
