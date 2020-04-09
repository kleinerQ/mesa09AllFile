import RPi.GPIO as GPIO
import time 

pinLED = 14
pinSR = 15

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinLED,GPIO.OUT)
GPIO.setup(pinSR,GPIO.IN)

try:
    while True:
	if GPIO.input(pinSR):
		print("1")
		time.sleep(1)
	else:
		print("0")
		time.sleep(1)
	GPIO.output(pinLED,GPIO.input(pinSR))
	time.sleep(1)

except KeyboardInterrupt:
  pass

GPIO.cleanup()
