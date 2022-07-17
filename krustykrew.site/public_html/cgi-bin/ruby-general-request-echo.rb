#!/usr/bin/ruby

require 'cgi'

cgi = CGI.new

puts cgi.header
puts "<html>"
puts "<head>"
puts "<title>Ruby General Request Echo</title>"
puts "<link rel=\"stylesheet\" href=\"/ruby.css\"/>"
puts "</head>"
puts "<body>"
puts "<h1>General Request Echo</h1>"
puts "<b> Protocol: </b>"
puts(ENV["SERVER_PROTOCOL"])
puts "<br>"
puts "<b> Method: </b>"
puts(ENV["REQUEST_METHOD"])
puts "<br>"
puts "<b> Query String: </b>"
puts(ENV["QUERY_STRING"])
puts "<br>"
puts "<b> Message Body: </b>"  
for i in cgi.keys do
    puts i 
    puts(" = ")
    puts cgi[i]
    puts "<br>"
    puts "<br>"
end
puts "</body>"
puts "</html>"