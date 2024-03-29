#!/usr/bin/ruby
require 'date'
require 'net/http'

def geo_ip(ip)
  res = Net::HTTP.get_response(URI.parse("http://api.hostip.info/get_html.php?ip=#{ip}")).body
  res = res.split("\n").join(":").split(":")
  "#{res[3]}, #{res[1]}"
end

LOG_FILE = '/opt/nginx/logs/access.log'
f = File.open('views/stats','w')
f.write "<br><br>\n\n"
f.write "Stats compiled on #{DateTime.now}\n\n"
hits = `cat #{LOG_FILE} |  awk '{print $7}' | grep haml | wc -l`
visitors = `awk '{if ($7 ~ /haml/) print $1}' < #{LOG_FILE} | sort | uniq | wc -l`
f.write("p(hits). *#{hits.rstrip}* hits\n*#{visitors.rstrip}* unique visitors\n\n")
f.write("h2. Most Popular\n\n")
f.write("|_. Title |_. Hits|\n")
f.write(`cat #{LOG_FILE} |  awk '{if ($7 ~ /haml/) print $7}' | sed 's/?\S*//' | sort | uniq -c | sort -r -n | head -n 10 | awk '{print "| ", $2," | ",$1," |"}' | sed -e 's/\\/blog\\///' -e 's/\+/ /g' -e 's/\.haml//'`)
f.write("\nh2. latest visitors\n\n")
f.write("|_. Visitor |_. Page |_. Referer |_. Date |\n")
lv = `tac #{LOG_FILE} | awk '{if ($7 ~ /haml/) print $1, $7, $11, $4}' | head -n 15`.split("\n").map{|x| x.split(" ")}
lv = lv.map{|v| [`host #{v[0]}`, geo_ip(v[0]), v[1], v[2], v[3]]}
lv.each_with_index {|x,i| f.write("{background: #{i%2==0 ? '#e6d8af' : 'white'}}.|#{x[0].split(" ")[4]},#{x[1]}|#{x[2]}|#{x[3]}|#{x[4]}|\n")}
f.write "\n\nh2. Hits by Month\n\n"
f.write `cat #{LOG_FILE} | awk '{if ($7 ~ /haml/) print $4}' | sed -e 's/:[0-9][0-9]//g' -e 's/\\[//' -e 's/[0-9][0-9]\\///' | uniq -c | awk '{print "|",$2,"|",$1,"|"}'`
f.write "\n\nh2. Top Referers\n\n"
f.write `cat #{LOG_FILE} | awk '{if($7 ~ /haml/) print $7, $11}' | more | grep -v "_-_" | awk '{print $2'} | sort | uniq -c | sort -r -n | grep -v "\"-\"" | head -10 | awk '{print "|", $2, "|", $1, "|"}'`

f.close


