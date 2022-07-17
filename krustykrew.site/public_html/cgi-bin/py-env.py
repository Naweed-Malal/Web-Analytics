#!/usr/bin/python3
import os

print("Cache-Control: no-cache")
print("Content-type:text/html\r\n\r\n")

print("<html>")
print("<head>")
print("<title>Environment Variables</title>")
print("</head>")
print("<body>")
print("<h1 align=center>Environment Variables</h1>")
print("<hr>")

for v in os.environ.keys():
    print("<b>%s:</b> %s<br />" % (v, os.environ[v]))

print("</body>")
print("</html>")
