#!/usr/bin/python3

import sys
from urllib.parse import parse_qsl

print("Cache-Control: no-cache")
print ("Content-type:text/html\r\n\r\n")
print("<html><head><title>POST Request Echo</title></head>"
	"<body><h1 align=center>POST Request Echo</h1><hr/>")

print(f"Message Body: {sys.stdin.read()}")

print("</br>")
print("</body>")
print("</html>")
