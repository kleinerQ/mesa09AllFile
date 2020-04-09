#!/usr/bin/python2.7-cgi                                                        
#coding=utf-8


from subprocess import call
call(["reboot"])


print("Content-type:text/html")
print("")
print("OK")
