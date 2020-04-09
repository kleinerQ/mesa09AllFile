#!/usr/bin/python2.7-cgi                                                        
#coding=utf-8



from subprocess import call
#import subprocess
#p1 = subprocess.Popen(['raspivid', '-o', '-', '-t', '0', '-w', '640', '-h', '360', '-fps', '25', '-b', '5000000', '-g', '30'], stdout=subprocess.PIPE)
#p2 = subprocess.Popen(['sudo', '-u', 'pi','cvlc', '-v', '-I', '"dummy"', 'stream:///dev/stdin', ':sout="#std{access=livehttp{seglen=1,delsegs=true,numsegs=1, index=/var/www/html/streaming/stream.m3u8, index-url=/streaming/stream-########.ts}, mux=ts{use-key-frames},dst=/var/www/html/streaming/stream-########.ts}"', ':demux=h264'], stdin=p1.stdout)
#p2.communicate()
#call(['raspivid', '-o', '-', '-t', '0', '-w', '640', '-h', '360', '-fps', '25', '-b', '5000000', '-g', '32'])
#call(['raspivid', '-o', '-', '-t', '0', '-w', '640', '-h', '360', '-fps', '25', '-b', '5000000', '-g', '30', '|', 'cvlc', '-v', '-I', '"dummy"', 'stream:///dev/stdin', ':sout="#std{access=livehttp{seglen=1,delsegs=true,numsegs=1, index=/var/www/html/streaming/stream.m3u8, index-url=/streaming/stream-########.ts}, mux=ts{use-key-frames},dst=/var/www/html/streaming/stream-########.ts}"', ':demux=h264'])
#import os
#os.system('raspivid -o - -t 0 -w 640 -h 360 -fps 25 -b 5000000 -g 30 | cvlc -v -I "dummy" stream:///dev/stdin :sout="#std{access=livehttp{seglen=1,delsegs=true,numsegs=1, index=/var/www/html/streaming/stream.m3u8, index-url=/streaming/stream-########.ts}, mux=ts{use-key-frames},dst=/var/www/html/streaming/stream-########.ts}" :demux=h264')

print("Content-type:text/html")
print("")
print("OK")
