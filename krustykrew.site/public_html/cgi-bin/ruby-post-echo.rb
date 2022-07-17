#!/usr/bin/ruby

require 'cgi'
require 'stringio'
cgi = CGI.new


puts cgi.header
puts "<html>"
puts "<head>"
puts "<title>Ruby POST echo</title>"
puts "<link rel=\"stylesheet\" href=\"/ruby.css\"/>"
puts "</head>"
puts "<body>"
puts "<h1>POST echo</h1>"
puts "<b>Message Body: </b>"
puts "<br></br>"
for i in cgi.keys do
    puts i 
    puts(" = ")
    puts cgi[i]
    puts "<br>"
    puts "<br>"
end
puts "</body>"
puts "</html>"