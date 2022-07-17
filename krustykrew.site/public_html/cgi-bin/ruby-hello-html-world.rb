#!/usr/bin/ruby
 
require 'cgi'
cgi = CGI.new

puts cgi.header
puts "<html>"
puts "<head>"
puts "<title>Hello, Ruby!</title>"
puts "<link rel=\"stylesheet\" href=\"/ruby.css\"/>"
puts "</head>"
puts "<body>"
puts "<h1>Hello, World!</h1>"
puts "<p>This page was generated with Ruby</p>"
time = Time.now
puts "<p>Current Time: "
puts time.inspect
puts "</p>"
puts "<p>Your curren IP Address is: " 
puts(ENV['REMOTE_ADDR'])
puts "</p>"
puts "</body>"
puts "</html>"