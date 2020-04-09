#!/usr/bin/python2.7-cgi                                                        
#coding=utf-8

from subprocess import call
call([ "sync"])
call([ "sync"])
call([ "shutdown","-r","now"])
'''
import os
os.system('sudo sync')
os.system('sudo sync')
os.system('sudo shutdown -r now')
'''

