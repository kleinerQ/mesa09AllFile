#!/bin/bash
# Timelapse controller for USB webCam

DIR=/home/pi/webcam130

x = 1
while [ $x -le 1440 ]; do
    filename=$(date -u +"%d%m%Y_%H%M-%S").jpg
    fswebcam -d /dev/video0 -r 1280x720 $DIR/$filename
    x=$(( $x + 1 ))
    sleep 10;
done; 
