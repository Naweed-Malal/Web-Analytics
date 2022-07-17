#!/usr/bin/ruby

require 'cgi'

cgi = CGI.new



print cgi.header
print "<html>"
print "<head>"
print "<title>Ruby Query String</title>"
puts "<link rel=\"stylesheet\" href=\"/ruby.css\"/>"
print "</head>"
print "<body>"
print "<h1>GET Query String</h1>"
print "<b> Query String: </b>"
print(ENV["QUERY_STRING"])
print "<br>"
print "<br>"
print "<b> Parsed Query: </b>"  
print(CGI::parse(ENV["QUERY_STRING"]))
print "</body>"
print "</html>"