#!/bin/bash

mkdir -p /var/log/motion
mkdir -p /data/usb/http/motion
mkdir -p /var/run/motion

chown -R http:http /var/log/motion
chown -R http:http /data/usb/http/motion
chown -R http:http /var/run/motion

chmod -x /etc/motion/motion.conf
