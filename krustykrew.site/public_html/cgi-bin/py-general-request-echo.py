#!/usr/bin/python3
import os
import sys
# from urllib.parse import parse_qsl

print("Cache-Control: no-cache")
print ("Content-type:text/html\r\n\r\n")
print("<html>")
print("<head>")
print("<title>General Request Echo</title>")
print("</head>")
print("<body>")
print("<h1 align=center>General Request Echo</h1><hr/>")
print(f"Protocol: {os.environ.get('SERVER_PROTOCOL')}<br/>")
print(f"Method: {os.environ.get('REQUEST_METHOD')}<br/>")
print(f"Query String: {os.environ.get('QUERY_STRING')}<br/>")
print(f"Message Body: {sys.stdin.read()}<br/>")
print("</body>")
print("</html>")
