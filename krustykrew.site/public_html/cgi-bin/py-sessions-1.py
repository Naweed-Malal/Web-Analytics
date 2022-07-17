#!/usr/bin/python3
import os, cgi
import sys

form = cgi.FieldStorage()
name = ""

if (name == "" and "username" in form):
    name = form["username"].value

if name :
  print(f"Set-Cookie: {name}")


print("Content-type: text/html\r\n\r\n")
print('<html>')
print('<head>')
print('<title>Python Sessions Page 1</title>')
print('</head>')
print('<body>')
print('<h1 align=center>Python Sessions Page 1</h1>')

if len(name) > 0:
    print("<tr><td>Cookie: " , name , "</td></tr>")
elif (os.environ.get('HTTP_COOKIE') != None and os.environ.get('HTTP_COOKIE') != "destroyed"):
    print("<tr><td>Cookie: " , os.environ.get('HTTP_COOKIE') , "</td></tr>")
else:
    print("<tr><td>Cookie: </td></tr> None") 

print("<br><br>")
print("<a href=\"/cgi-bin/py-sessions-2.py\">Session Page 2</a><br/>")
print("<a href=\"/py-cgiform.html\">Python CGI Form</a><br />")
print ('<form action="./py-destroy-session.py" method="GET">')
print ('<button type="submit">Destroy Session</button>')

print('</body>')
print('</html>')



