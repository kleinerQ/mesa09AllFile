import io
import picamera
import cv2
import numpy


import socket, ssl, json, struct, binascii, sys

host = ('gateway.sandbox.push.apple.com',2195)

token = '4361dc6305eaa10ccbe0d9664ddf8f5a209f276447990e2a16587161c74fd703'
key = './key2.pem'

payload = {
    "aps" : {
        "alert" : sys.argv[1],
        "sound" : "default",
        "badge" : sys.argv[2]

    }
}

data = json.dumps(payload)
byteToken = binascii.unhexlify(token)
format = '!BH32sH%ds' % len(data)
noti = struct.pack(format, 0, 32, byteToken, len(data), data)




#Create a memory stream so photos doesn't need to be saved in a file
stream = io.BytesIO()

#Get the picture (low resolution, so it should be quite fast)
#Here you can also specify other parameters (e.g.:rotate the image)
with picamera.PiCamera() as camera:
    camera.resolution = (320, 240)
    camera.capture(stream, format='jpeg')

#Convert the picture into a numpy array
buff = numpy.fromstring(stream.getvalue(), dtype=numpy.uint8)

#Now creates an OpenCV image
image = cv2.imdecode(buff, 1)
cv2.namedWindow("My")

#image = cv2.imread('0.jpg')
cv2.imshow("My",image)
cv2.waitKey(5000)
#Load a cascade file for detecting faces
face_cascade = cv2.CascadeClassifier('/home/pi/haarcascades/haarcascade_frontalface_default.xml')

#Convert to grayscale
gray = cv2.cvtColor(image,cv2.COLOR_BGR2GRAY)

#Look for faces in the image using the loaded cascade file
faces = face_cascade.detectMultiScale(gray, 1.1, 5)

print "Found "+str(len(faces))+" face(s)"


#app push notification
if len(faces) > 0:
    ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
    ssl_sock.connect(host)
    ssl_sock.write(noti)
    ssl_sock.close()


#Draw a rectangle around every found face
for (x,y,w,h) in faces:
    cv2.rectangle(image,(x,y),(x+w,y+h),(255,0,0),2)

#Save the result image
cv2.imwrite('Desktop/result.jpg',image)
