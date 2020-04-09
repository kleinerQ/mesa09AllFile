import RPi.GPIO as GPIO
import time
import threading


#magnetStatus = 0
magnetSensorPin = 2
buzzerPin = 12
GPIO.setmode(GPIO.BCM)
GPIO.setup(magnetSensorPin, GPIO.IN, pull_up_down=GPIO.PUD_UP)
GPIO.setup(buzzerPin,GPIO.OUT)
p  =  GPIO.PWM(buzzerPin,  50)


class doorWatch(threading.Thread):
    def __init__(self, seconds):
        threading.Thread.__init__(self)
        self.seconds = seconds

    def run(self):
        start = time.time()
        time.clock()
        elapsed = 0
        while True:
            if elapsed > self.seconds:
                if GPIO.input(magnetSensorPin):
                    print("Door is opened")
                    p.start(50)
                    p.ChangeFrequency(659)
                    time.sleep(1)
                    p.stop()
                    GPIO.cleanup()
                else:
                    print("Door is closed")
                    p.stop()
                    GPIO.cleanup()
                return
            elapsed = time.time() - start
            #print("%02d" %elapsed)
            time.sleep(1)


doorWatch(3).start()

