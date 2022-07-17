#!/usr/bin/python3

import os
import time
import json

import socket

hostname = socket.gethostname()
address = socket.gethostbyname(hostname)

print("Cache-Control: no-cache")
print("Content-type: application/json\r\n\r\n")

data = {
    "message": "Hello World",
    "date": time.ctime(),
    "currentIP": format(address)
}
j = json.dumps(data)
print(j)

