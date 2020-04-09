#!/usr/bin/python2.7-cgi

print("Content-type:text/html")
print("")

import os
os.system('./openStream.sh &')

