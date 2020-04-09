import RPi.GPIO as GPIO
pinLED = 14
isOn = 0

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinLED,GPIO.OUT)

GPIO.output(pinLED,isOn)
