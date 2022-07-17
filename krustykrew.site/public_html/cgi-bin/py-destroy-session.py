#!/usr/bin/python3

print("Cache-Control: no-cache")
print("Set-Cookie: destroyed")
print("Content-Type:text/html\r\n\r\n")

print("<html>")
print("<head>")
print("<title>Python Session Destroyed</title>")
print("</head>")
print("<body>")
print("<h1>Python Session Destroyed</h1>")

print("<a href=\"/cgi-bin/py-sessions-1.py\">Back to Page 1</a><br/>")
print("<a href=\"/cgi-bin/py-sessions-2.py\">Back to Page 2</a><br/>")
print("<a href=\"/py-cgiform.html\">Python CGI Form</a><br/>")

print("</body>")
print("</html>")
