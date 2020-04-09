#_*_ coding: utf-8 _*_

import socket, ssl, json, struct, binascii, sys

# 開發用
host = ('gateway.sandbox.push.apple.com',2195)

#產品用
#host = ('gateway.push.apple.com',2195)

#換成正確的token
token = '4361dc6305eaa10ccbe0d9664ddf8f5a209f276447990e2a16587161c74fd703'

#換成正確的金鑰檔名與路徑
key = './key2.pem'

#payload
payload = {
	"aps":{
          "alert":{
              "title":"Push Pizza Co.",
              "body":"Your pizza is almost ready!"
           },
           "badge":42,
           "sound":"default",
           "category":"c1"
    	}		


	#"aps" : {
	#	"alert" : sys.argv[1],
	#	"sound" : "1",
	#	"badge" : int(sys.argv[2]),
	#	"category" : "c1"
	#}
}

data = json.dumps(payload)
byteToken = binascii.unhexlify(token)
format = '!BH32sH%ds' % len(data)
noti = struct.pack(format, 0, 32, byteToken, len(data), data)

ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
ssl_sock.connect(host)
ssl_sock.write(noti)
ssl_sock.close()


