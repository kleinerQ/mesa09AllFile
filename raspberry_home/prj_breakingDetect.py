#coding=utf-8
### Imports ###################################################################


from picamera.array import PiRGBArray
from picamera import PiCamera
from functools import partial

import multiprocessing as mp
import cv2
import os
import time
import datetime
import socket, ssl, json, struct, binascii, sys
import  MySQLdb
import urllib
import json
response = urllib.urlopen("http://simonhost.hopto.org/chatroom/queryToken.php")
data = response.read()

jsonData = json.loads(data)


tokenList = []
for token in jsonData:
    if token["token"] != 'NULL':
        #print(token["token"])
        tokenList.append(str(token["token"]))

print(tokenList)





host = ('gateway.sandbox.push.apple.com',2195)

#tokenList = ['23f4b3e7be98c064c71841d6fc8c290217c71f67209cf999631de4511b0ec231','40ed51f24fb70650192b0cd5086038ed5d16c7c480653ba9b65581bc57cd7089']

#token = '23f4b3e7be98c064c71841d6fc8c290217c71f67209cf999631de4511b0ec231'
key = './keyPrj.pem'

payload = {
    "aps" : {
        "alert" : sys.argv[1],
        "sound" : "default",
        "badge" : sys.argv[2],
        "category" : "c1"
    }
}

data = json.dumps(payload)



### Setup #####################################################################

os.putenv( 'SDL_FBDEV', '/dev/fb0' )

resX = 320
resY = 240

cx = resX / 2
cy = resY / 2
'''
os.system( "echo 0=150 > /dev/servoblaster" )
os.system( "echo 1=150 > /dev/servoblaster" )
'''
xdeg = 150
ydeg = 150


# Setup the camera
camera = PiCamera()
camera.resolution = ( resX, resY )
camera.framerate = 60

# Use this as our output
rawCapture = PiRGBArray( camera, size=( resX, resY ) )

# The face cascade file to be used
face_cascade = cv2.CascadeClassifier('haarcascade_upperbody.xml')

t_start = time.time()
fps = 0
faceCounter = 0
nowTime = datetime.datetime.now()
nowTimeString = nowTime.strftime("%Y%m%d_%H_%M%S_")
frameCounter = 0
pushFlag = False
### Helper Functions ##########################################################

def get_faces( img ):

    gray = cv2.cvtColor( img, cv2.COLOR_BGR2GRAY )
    faces = face_cascade.detectMultiScale( gray )

    return faces, img

def draw_frame( img, faces ):

    global xdeg
    global ydeg
    global fps
    global time_t

    print "Found " + str( len( faces ) ) + " face(s)"
    # Draw a rectangle around every face
    for ( x, y, w, h ) in faces:
        global faceCounter 
        global pushFlag
        cv2.rectangle( img, ( x, y ),( x + w, y + h ), ( 200, 255, 0 ), 2 )
        cv2.putText(img, "Notice:" + str( len( faces ) ), ( x, y ), cv2.FONT_HERSHEY_SIMPLEX, 0.5, ( 0, 0, 255 ), 2 )
        file_path = '~/'
        file_name = '/var/www/html/streaming/streamingFile/' + str(nowTimeString) + str(faceCounter) + '_FaceResult.jpg'    
        cv2.imwrite(file_name,img)
        faceCounter += 1
        pushFlag = True
        #print(faceCounter)
        '''
        tx = x + w/2
        ty = y + h/2

        if   ( cx - tx > 15 and xdeg <= 190 ):
            xdeg += 1
            os.system( "echo 0=" + str( xdeg ) + " > /dev/servoblaster" )
        elif ( cx - tx < -15 and xdeg >= 110 ):
            xdeg -= 1
            os.system( "echo 0=" + str( xdeg ) + " > /dev/servoblaster" )

        if   ( cy - ty > 15 and ydeg >= 110 ):
            ydeg -= 1
            os.system( "echo 1=" + str( ydeg ) + " > /dev/servoblaster" )
        elif ( cy - ty < -15 and ydeg <= 190 ):
            ydeg += 1
            os.system( "echo 1=" + str( ydeg ) + " > /dev/servoblaster" )
        '''
    '''
    # Calculate and show the FPS
    fps = fps + 1
    sfps = fps / (time.time() - t_start)
    cv2.putText(img, "FPS : " + str( int( sfps ) ), ( 10, 10 ), cv2.FONT_HERSHEY_SIMPLEX, 0.5, ( 0, 0, 255 ), 2 ) 

    cv2.imshow( "Frame", img )
    cv2.waitKey( 1 )

    '''
### Main ######################################################################

if __name__ == '__main__':

    pool = mp.Pool( processes=4 )
    fcount = 0

    camera.capture( rawCapture, format="bgr" )  

    r1 = pool.apply_async( get_faces, [ rawCapture.array ] )    
    r2 = pool.apply_async( get_faces, [ rawCapture.array ] )    
    r3 = pool.apply_async( get_faces, [ rawCapture.array ] )    
    r4 = pool.apply_async( get_faces, [ rawCapture.array ] )    

    f1, i1 = r1.get()
    f2, i2 = r2.get()
    f3, i3 = r3.get()
    f4, i4 = r4.get()

    rawCapture.truncate( 0 )    

    for frame in camera.capture_continuous( rawCapture, format="bgr",use_video_port=True ):
        try:
            image = frame.array

            if   fcount == 1:
                r1 = pool.apply_async( get_faces, [ image ] )
                f2, i2 = r2.get()
                draw_frame( i2, f2 )

            elif fcount == 2:
                r2 = pool.apply_async( get_faces, [ image ] )
                f3, i3 = r3.get()
                draw_frame( i3, f3 )

            elif fcount == 3:
                r3 = pool.apply_async( get_faces, [ image ] )
                f4, i4 = r4.get()
                draw_frame( i4, f4 )

            elif fcount == 4:
                r4 = pool.apply_async( get_faces, [ image ] )
                f1, i1 = r1.get()
                draw_frame( i1, f1 )

                fcount = 0

            fcount += 1
            frameCounter += 1
            print(frameCounter)
            if frameCounter == 30:
                if pushFlag:
                    for token in tokenList:
                        #print(token)
                        byteToken = binascii.unhexlify(token)
                        format = '!BH32sH%ds' % len(data)
                        noti = struct.pack(format, 0, 32, byteToken, len(data), data)
                        ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
                        ssl_sock.connect(host)
                        ssl_sock.write(noti)
                        ssl_sock.close()

                rawCapture.truncate( 0 )
                pool.terminate()
                break;
            rawCapture.truncate( 0 )
        except  KeyboardInterrupt:
            pass
