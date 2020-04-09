#_*_ coding: utf-8 _*_

import socket, ssl, json, struct, binascii, sys

# 開發用
host = ('gateway.sandbox.push.apple.com',2195)

#產品用
#host = ('gateway.push.apple.com',2195)

#換成正確的token
token = '12db2c70e85cc205b294686333b54eac0fedf49f2f7c4faf2ca6622702bed320'

#換成正確的金鑰檔名與路徑
key = './key.pem'

#payload
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

ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
ssl_sock.connect(host)
ssl_sock.write(noti)
ssl_sock.close()


