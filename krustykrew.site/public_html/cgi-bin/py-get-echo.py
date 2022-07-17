#!/usr/bin/python3
import os
import cgi

form = cgi.FieldStorage()
print("Cache-Control:no-cache")
print("Content-Type:text/html\r\n\r\n")

print("<html>")
print("<head><title>Get Request Echo</title></head>")
print("<body>")

print("<h1>Get Request Echo</h1>")
print("<p> Raw Query String:" +  str(os.environ.get("QUERY_STRING")) + "</p>")
print ("<p>Formatted Query String: </p>")
for k in form.keys():
    print("<p>" + str(k) + ": " + str(form[str(k)].value) + "</p>")


print("</body></html>")
