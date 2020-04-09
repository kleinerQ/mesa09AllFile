#!/usr/bin/python2.7-cgi


import os
import time
os.system('stdbuf -oL /usr/bin/python2.7-cgi-piUser faceDetect0704StreamingFullCPUAccess.py > dd.txt &')


print("Content-type:text/html")
print("")
