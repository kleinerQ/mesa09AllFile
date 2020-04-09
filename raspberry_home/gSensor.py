from adxl345 import ADXL345
import time 
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setup(14,GPIO.OUT)


adxl345 = ADXL345()
GPIO.output(14,1)

try:

    while True:
        axes = adxl345.getAxes(True)
        print(' x = %.3fG' % ( axes['x']))
        print(' y = %.3fG' % ( axes['y']))
        print(' z = %.3fG' % ( axes['z']))
        print(' ------- ')
        if axes['z'] < 0:
            GPIO.output(14,0)
        else:
            GPIO.output(14,1)
        time.sleep(1)
except KeyboardInterrupt:
    pass

GPIO.cleanup()
