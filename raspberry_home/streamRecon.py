
from picamera import PiCamera
import time
import cv2
from PIL import Image
camera = PiCamera()


#path = "haarcascade_frontalface_default.xml"
#face_cascade = cv2.CascadeClassifier(path)
face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
cv2.namedWindow("Photo")

camera.start_preview()
for i in range(2):
    time.sleep(1)
    camera.capture('/home/pi/Desktop/%s.jpg' % i)
    
camera.stop_preview()

print("gg")  

for i in range(2):
    #print(i)
    imgName = '/home/pi/Desktop/' + str(i) + '.jpg'
    print(imgName)
    #imgName = '/home/pi/1.jpg'
    img = cv2.imread(imgName)
    faces = face_cascade.detectMultiScale(img,1.2, 2)
    print(faces)


