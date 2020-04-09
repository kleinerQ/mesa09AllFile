import RPi.GPIO as GPIO 
import time 
import  urllib2 as  urllib 
pinLED = 14

pinSR = 23
GPIO.setmode(GPIO.BCM)  
GPIO.setup(pinLED,  GPIO.OUT)  
GPIO.setup(pinSR,  GPIO.IN) 

try:
    while True:
        GPIO.output(pinLED,  GPIO.input(pinSR))
        time.sleep(0.1) 
        if GPIO.input(pinSR) == 1:
            response  = urllib.urlopen('https://api.thingspeak.com/update?api_key=K0MK9ECOQ6J13W4J&field3=1')

except  KeyboardInterrupt:pass

GPIO.cleanup()
