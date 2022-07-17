#!/usr/bin/ruby

require 'cgi'

cgi = CGI.new
params = cgi.params

if not params.key?('formName')
    params['formName'] = ''
end

cookie = CGI::Cookie.new('name' => 'ruby_cookie', 'value' => params['formName'])

if (ENV['REQUEST_METHOD'] != 'POST' && cgi.cookies.key?('ruby_cookie') && cgi.cookies()['ruby_cookie'].value != "")
    cookie = cgi.cookies()['ruby_cookie'] #Check if valid cookie
end


puts cgi.header('cookie' => [cookie], 'type' => 'text/html')
puts "<html>"
puts "<head>"
puts "<title>Ruby Sessions Page</title>"
puts "</head>"
puts "<body>"
puts "<h1>Sessions Page</h1>"
puts "<b>Cookie: </b>"
puts cookie.value
puts "<br>"
puts "<br>"
puts("<a href=\"/ruby-cgiform.html\">Ruby CGI Form</a><br />")
puts("<a href=\"/index.html\">Home</a><br />")
puts "</body>"
puts "</html>"