#!/usr/bin/ruby
require 'date'
LOG_FILE = '/opt/nginx/logs/access.log'
f = File.open('views/stats','w')
f.write "<br><br>\n\n"
f.write "Stats compiled on #{DateTime.now}\n\n"
hits = `cat #{LOG_FILE} |  awk '{print $7}' | grep haml | wc -l`
visitors = `awk '{print $1, $7'} < #{LOG_FILE} | grep haml | awk '{print $1}' | sort | uniq | wc -l`
f.write("p(hits). *#{hits.rstrip}* hits\n*#{visitors.rstrip}* unique visitors\n\n")
f.write("h2. Most Popular\n\n")
f.write("|_. Title |_. Hits|\n")
f.write(`cat #{LOG_FILE} |  awk '{print $7}' | grep haml | sed 's/?\S*//' | sort | uniq -c | sort -r -n | head -n 10 | awk '{print "| ", $2," | ",$1," |"}' | sed -e 's/\\/blog\\///' -e 's/\+/ /g' -e 's/\.haml//'`)
f.write("\nh2. latest visitors\n\n")
lv = `tail -n 100 #{LOG_FILE} | awk '{print $1, $7}' | grep haml`.split("\n").map{|x| x.split(" ")}
lv = lv.map{|v| [`host #{v[0]}`, v[1]]}
lv.each {|x| f.write("|#{x[0].split(" ")[4]}|#{x[1]}|\n")}
f.write "\n\nh2. Hits by Month\n\n"
f.write `cat #{LOG_FILE} | awk '{print $4, $7}' | grep haml | awk '{print $1}' | sed -e 's/:[0-9][0-9]//g' -e 's/\\[//' -e 's/[0-9][0-9]\\///' | uniq -c | awk '{print "|",$2,"|",$1,"|"}'`
f.close


