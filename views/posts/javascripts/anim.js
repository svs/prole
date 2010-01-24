$(document).ready(function() {
  // queue the effects
  timeout = 2000;
  _q = 0;
  q = new Array();
  q = [    function(){
      $('#header').jTypeWriter({duration: 3,onComplete:finished});
    },
    function(){
      $('#img_stop').slideDown("slow", finished);
    },
    function(){
      setTimeout(function(){
		   $('#quit').show();
		   $('#quit').jTypeWriter({duration: 3,onComplete:finished});
		 }, timeout*2);
    },
    function(){
      $('#madness').show();
      $('#madness').jTypeWriter({duration: 3,onComplete:finished});
    },
    function(){
      $('#blv').show('slow', finished);
    },
    function(){
      $('#celebrate').show("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#no').slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=500px"}, finished);
    },
    function(){
      $('#padmini').show("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#glorify').slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#oohlala').slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#oohlala').slideDown("slow", finished);
    },
    function(){
      $('#india_tv').show("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#news').slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#yeah_right').slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#bhoot-aaa').show("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#news2').slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=500px"}, finished);
    },
    function(){
      $('#news2').next().slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#news2').next().next().slideDown("slow", function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#money').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=200px"}, finished);
    },
    function(){
      $('#salary').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#bg2').show(function(){setTimeout(finished,timeout);});
      $('.presentation').animate({left: "-=1300px"}, 2000, finished);
    },
    function(){
      $('#dr_evil').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#dr_evil').next().show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#spend').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#spend').next().show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=200px"}, finished);
    },
    function(){
      $('#pollution').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=200px"}, finished);
    },
    function(){
      $('#pollution').next().show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=200px"}, finished);
    },
    function(){
    $('#fish_dying').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#deforestation').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=1000px"}, finished);
    },
    function(){
      $('#deforestation').next().show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#murdoch').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#planman').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#plan').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=1000px"}, finished);
    },
    function(){
      $('#sunflower').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('#educate').show(function(){setTimeout(finished,timeout);});
    },
    function(){
      $('.presentation').animate({left: "-=1000px"}, finished);
    },
    function(){
      $('#postit').show(function(){setTimeout(finished,2000);});
    },
    function(){
      $('.presentation').animate({left: "-=1500px"}, finished);
    },
    function(){
      $('#thanks').show(function(){setTimeout(finished,timeout);});
    }




  ];
  q[0].call();
});

finished = function() {
  _q = _q + 1;
  console.log("q:"+q);
  if (_q < q.length) {
    q[_q].call();
  }
};

