#!/usr/bin/ruby

require 'cgi'
require 'json'

cgi = CGI.new
time = Time.now

my_object = { :time => time, :IP => ENV['REMOTE_ADDR'], :title => "Hello, Ruby!", :heading => "Hello, World!", :message => "This page was generated with Ruby"}

puts cgi.header
puts(JSON.pretty_generate(my_object))