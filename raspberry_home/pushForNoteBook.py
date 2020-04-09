#!/usr/bin/python2.7-cgi

#coding=utf-8
import cgi

form = cgi.FieldStorage()
message = form.getvalue("message") 

import os
import time
import datetime
import socket, ssl, json, struct, binascii, sys
import MySQLdb
import urllib
import json

if message is None:
    message = 'Read Family Message'

response = urllib.urlopen("http://simonhost.hopto.org/chatroom/queryToken.php")
data = response.read()

jsonData = json.loads(data)


tokenList = []
for token in jsonData:
    if token["token"] != 'NULL':
        #print(token["token"])
        tokenList.append(str(token["token"]))

#print(tokenList)





host = ('gateway.sandbox.push.apple.com',2195)

#tokenList = ['23f4b3e7be98c064c71841d6fc8c290217c71f67209cf999631de4511b0ec231','40ed51f24fb70650192b0cd5086038ed5d16c7c480653ba9b65581bc57cd7089']

#token = '23f4b3e7be98c064c71841d6fc8c290217c71f67209cf999631de4511b0ec231'
key = './keyPrj.pem'

payload = {
    "aps" : {
        "alert" : str(message),
        "sound" : "default",
        "badge" : 1,
        "category" : "c1"
    }
}

data = json.dumps(payload)

for token in tokenList:
    print(token)
    byteToken = binascii.unhexlify(token)
    format = '!BH32sH%ds' % len(data)
    noti = struct.pack(format, 0, 32, byteToken, len(data), data)
    ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
    ssl_sock.connect(host)
    ssl_sock.write(noti)
    ssl_sock.close()

print("Content-type:text/html")
print("")
print("OK")
