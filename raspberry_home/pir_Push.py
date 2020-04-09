#coding=utf8
import RPi.GPIO as GPIO
import time
import socket, ssl, json, struct, binascii, sys

host = ('gateway.sandbox.push.apple.com',2195)

#產品用
#host = ('gateway.push.apple.com',2195)

#換成正確的token
token = '4361dc6305eaa10ccbe0d9664ddf8f5a209f276447990e2a16587161c74fd703'

#換成正確的金鑰檔名與路徑
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

GPIO.setmode(GPIO.BCM)
GPIO.setup(14,GPIO.OUT)
GPIO.setup(23, GPIO.IN)
try:
    while True:
        if GPIO.input(23):
            GPIO.output(14,1)
            time.sleep(1)
            GPIO.output(14,0)
            ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
            ssl_sock.connect(host)
            ssl_sock.write(noti)
            ssl_sock.close()
except KeyboardInterrupt:
    pass

GPIO.cleanup()
