#!/bin/bash-cgi

raspivid -o - -t 0 -w 640 -h 360 -fps 25 -b 5000000 -g 30 | tee ~/`date +%Y-%m-%d_%H_%M_%S`.h264  |cvlc -v -I "dummy" stream:///dev/stdin :sout="#std{access=livehttp{seglen=1,delsegs=true,numsegs=1, index=/var/www/html/streaming/stream.m3u8, index-url=/streaming/stream-########.ts}, mux=ts{use-key-frames},dst=/var/www/html/streaming/stream-########.ts}" :demux=h264
