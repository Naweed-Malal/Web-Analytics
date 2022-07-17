#!/usr/bin/python3
import os, sys

name = sys.stdin.read()
print("Cache-Control: no-cache")
print("Content-type: text/html\r\n\r\n")
print("<html><head><title>Python Sessions</title></head><body>")
print("<h1>Python Session Page 2</h1>")
print("<table>")
if (name) : 
    print("<tr><td>Cookie:</td><td>", name ,"</td></tr>\n")
elif os.environ.get("HTTP_COOKIE") != None  and os.environ.get("HTTP_COOKIE") != "destroyed":
    print("<tr><td>Cookie:</td><td>",os.environ.get("HTTP_COOKIE"),"</td></tr>\n")
else: 
    print("<tr><td>Cookie:</td><td>None</td></tr>\n")

print("</table>")
print("<br><br>")
print("<a href=\"/cgi-bin/py-sessions-1.py\">Session Page 1</a><br/>")
print("<a href=\"/py-cgiform.html\">Python CGI Form</a><br />")
print ('<form action="./py-destroy-session.py" method="GET">')
print ('<button type="submit">Destroy Session</button>')

print("</body>")
print("</html>")
