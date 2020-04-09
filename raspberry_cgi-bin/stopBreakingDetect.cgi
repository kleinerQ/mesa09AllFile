#!/usr/bin/python2.7-cgi
#coding=utf-8
import cgi
import os
import sys


print("Content-type:text/html")
print("")
print("OK")
sys.stdout.flush()

os.system("sudo ps axu | grep python2.7 | grep -v grep | awk '{ print $2 }' | xargs kill -9")



