import socket, ssl, json, struct, binascii, sys

host = ('gateway.sandbox.push.apple.com',2195)
tokenList= ['40ed51f24fb70650192b0cd5086038ed5d16c7c480653ba9b65581bc57cd7089','be4342d0b30fe21381615174e0016a6cb76d25c9765fcd2f1fe2cf31723c994c']
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

for token in tokenList:
    #print(token)
    byteToken = binascii.unhexlify(token)
    format = '!BH32sH%ds' % len(data)
    noti = struct.pack(format, 0, 32, byteToken, len(data), data)
    ssl_sock = ssl.wrap_socket(socket.socket(), certfile = key)
    ssl_sock.connect(host)
    ssl_sock.write(noti)
    ssl_sock.close()
