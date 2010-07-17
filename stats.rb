#!/usr/bin/ruby
f = File.open('views/posts/stats','w')
f.write "<br><br>\n\n"
hits = `cat access.log |  awk '{print $7}' | grep haml | wc -l`
visitors = `awk '{print $1, $7'} < access.log | grep haml | awk '{print $1}' | sort | uniq | wc -l`
f.write("p(hits). *#{hits.rstrip}* hits\n*#{visitors.rstrip}* unique visitors\n\n")
f.write("h2. Most Popular\n\n")
f.write("|_. Title |_. Hits|\n")
f.write(`cat access.log |  awk '{print $7}' | grep haml | sed 's/?\S*//' | sort | uniq -c | sort -r -n | head -n 10 | awk '{print "| ", $2," | ",$1," |"}' | sed -e 's/\\/blog\\///' -e 's/\+/ /g' -e 's/\.haml//'`)
f.write("\nh2. latest visitors\n\n")
f.write(`tail -n 100 access.log | grep haml | awk '{print "|",$1,"|", $7,"|"}'`)
f.close


