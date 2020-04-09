import RPi.GPIO as GPIO
import time, threading


class Myclass(threading.Thread):
    def __init__(self, btnPin, ledPin):
        threading.Thread.__init__(self)
        self.btnPin = btnPin
        self.ledPin = ledPin
    
    def run(self):        
        while True:
            print('gg')
            if GPIO.input(self.btnPin):
                GPIO.output(self.ledPin,1)
                print('aa')
                time.sleep(5)
                GPIO.output(self.ledPin,0)
            time.sleep(0.01)


btn1Pin = 14
btn2Pin = 15
led1Pin = 23
led2Pin = 24
GPIO.setmode(GPIO.BCM)
GPIO.setup(led1Pin,GPIO.OUT)
GPIO.setup(led2Pin,GPIO.OUT)

GPIO.setup(btn1Pin,GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(btn2Pin,GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

try:

    while True:
            if GPIO.input(btn1Pin):
                GPIO.output(led1Pin,1)
                print('aa')
                time.sleep(2)
                GPIO.output(led1Pin,0)
            

            if GPIO.input(btn2Pin):
                GPIO.output(led2Pin,1)
                print('bb')
                time.sleep(2)
                GPIO.output(led2Pin,0)
            

            
except KeyboardInterrupt:
        pass

GPIO.cleanup()
