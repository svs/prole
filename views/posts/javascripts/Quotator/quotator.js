// JavaScript Document
(function($){
  $.fn.quotator = function(options){
    var container = this;
    var defaults = 
    {
      speed : 5000,
      json : "quotator_quotes.js"
    }
    
    var options = $.extend(defaults, options);
    
    var quotes_json = options.json;
    var quotes;
    
    $.getJSON(quotes_json, function(data){
    var quotesobject = eval(data.quotes);
    var index = 0;
    
    
    setInterval(changeQuote, options.speed);
    
    container.html(quotesobject[index].quote + "<div id='author'>" + quotesobject[index].author + "</div>");
    
    
    function changeQuote(){
      container.fadeOut(function(){
        container.html(quotesobject[index].quote + "<div id='author'>" + quotesobject[index].author + "</div>").fadeIn();
      });
      
      if(index == quotesobject.length - 1){
        index = 0;
      } else{
        index++;
      }
    }
      
  });
  return container;
}
})(jQuery);