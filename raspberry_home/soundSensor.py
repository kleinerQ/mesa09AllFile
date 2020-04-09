import RPi.GPIO as GPIO
import time

pinECHO  =  23
pinTRIG  =  24
GPIO.setmode(GPIO.BCM)  
GPIO.setup(pinECHO,  GPIO.IN)  
GPIO.setup(pinTRIG,  GPIO.OUT) 


def pulseIn(pin):        
    n  =  0
    while  GPIO.input(pin)  ==  0:  
        if  n  <  1000:                        
            sonar_signal_begin  =  time.time()
        else:  
            print  ("error")  
            return  0              
        n  =  n  +  1
    while  GPIO.input(pin)  ==  1:                
        sonar_signal_end  =  time.time()      
    time_diff  =  sonar_signal_end  -  sonar_signal_begin
    return  time_diff  *  1000000


try:
    while  True:                
        GPIO.output(pinTRIG,  0)               
        time.sleep(2  /  1000000)                
        GPIO.output(pinTRIG,  1)               
        time.sleep(10  /  1000000)                
        GPIO.output(pinTRIG,  0)  
        d  =  pulseIn(pinECHO)  /  28.9  /  2
        print  ("Distance:  "  +  str(d)  +  "  cm")               
        time.sleep(0.2)  
except  KeyboardInterrupt:pass
GPIO.cleanup()
