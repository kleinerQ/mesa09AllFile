#!/usr/bin/python2.7-cgi
#coding=utf-8


import os
os.system('pkill vlc')
os.system('pkill -9 raspivid')


print("Content-type:text/html")
print("")
print("OK")
