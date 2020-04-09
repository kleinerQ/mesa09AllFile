#_*_ coding: utf-8 _*_

import socket, ssl, json, struct, binascii, sys

# 開發用
host = ('gateway.sandbox.push.apple.com',2195)

#產品用
#host = ('gateway.push.apple.com',2195)

#換成正確的token
tokenList = ['23f4b3e7be98c064c71841d6fc8c290217c71f67209cf999631de4511b0ec231',
             '40ed51f24fb70650192b0cd5086038ed5d16c7c480653ba9b65581bc57cd7089']
#token = '4361dc6305eaa10ccbe0d9664ddf8f5a209f276447990e2a16587161c74fd703'

#換成正確的金鑰檔名與路徑
key = './keyPrj.pem'

#payload
payload = {
	"aps" : {
		"alert" : sys.argv[1],
		"sound" : "default",
		"badge" : sys.argv[2]

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


