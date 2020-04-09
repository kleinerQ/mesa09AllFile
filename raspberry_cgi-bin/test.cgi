#!/usr/bin/python

#coding=utf-8

import cgi
form = cgi.FieldStorage()
text = form.getvalue("text")
if text is None:
    text = 'no one'

print("content-type:text/html")
print("")

print('<html>')

print('<head><title>My HomePage</title>')
print('</head>')

print('<body>')
print('<h1><font color="blue">'+ text +'</font></h1>')

print('</body>')

print('</html>')
