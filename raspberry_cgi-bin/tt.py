import RPi.GPIO as GPIO
GPIO.cleanup()
GPIO.setmode(GPIO.BCM)

pin = 7

GPIO.setmode(GPIO.BCM)
GPIO.setup(pin,GPIO.OUT)
while True:
    GPIO.output(pin,1)

GPIO.cleanup()

