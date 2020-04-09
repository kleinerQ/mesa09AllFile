import  RPi.GPIO  as  GPIO  
import  time

def degreeToDutyCycleAndMove(degree):
     dc = ( 12 - 2.5 ) / 180 * degree + 2.5
     p.ChangeDutyCycle(dc)
     time.sleep(3)



pinSR = 25
GPIO.setmode(GPIO.BCM)
GPIO.setup(pinSR,GPIO.OUT)
p = GPIO.PWM(pinSR, 50)
p.start(0)


degreeToDutyCycleAndMove(0)
degreeToDutyCycleAndMove(90)
degreeToDutyCycleAndMove(180)
GPIO.cleanup()



