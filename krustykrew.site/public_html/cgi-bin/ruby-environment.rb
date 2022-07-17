#!/usr/bin/ruby

require 'cgi'
cgi = CGI.new
envVars = ENV.to_a

$i = 0

puts cgi.header

puts "<html>"
puts "<head>"
puts "<title>Ruby Environment Variables</title>"
puts "<link rel=\"stylesheet\" href=\"/ruby.css\"/>"
puts "</head>"
puts "<body>"
puts "<h1>Environment Variables</h1>"
puts "<ul>"
for i in envVars 
    puts "<li>"
    puts envVars[$i]
    puts"</li>"
    $i = $i + 1
end
puts "</body>"
puts "</html>"