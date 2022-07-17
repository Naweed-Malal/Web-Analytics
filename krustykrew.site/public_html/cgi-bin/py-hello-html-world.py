#!/usr/bin/python3

import os
import time
import socket

hostname = socket.gethostname()
address = socket.gethostbyname(hostname)

print( "Cache-Control: no-cache")
print("Content-type:text/html\r\n\r\n")
print('<html>')
print('<head>')
print('<title>Hello HTML World</title>')
print('</head>')
print('<body>')
print('<h1 align=center>Hello HTML World</h1>')
print('<hr>')
print('<p>This program was generated at: ', time.ctime(), '</p>')
print("<br>")
print(f'Your current IP address is: {address}')
print('</body></html>')
