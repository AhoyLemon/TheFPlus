/* jshint -W117 */

function sendGA(c, a, l, v) {
  if (v) {
    ga('send', 'event', { eventCategory: c, eventAction: a, eventLabel: l, eventValue:v });
    console.log('CATEGORY: '+c+', ACTION:'+a+', LABEL:'+l+', VALUE:'+v);
  } else if (l) {
    ga('send', 'event', { eventCategory: c, eventAction: a, eventLabel: l });
    console.log('CATEGORY: '+c+', ACTION:'+a+', LABEL:'+l);
  } else {
    ga('send', 'event', { eventCategory: c, eventAction: a });
    console.log('CATEGORY: '+c+', ACTION:'+a);
  }
}

$('nav.toggle a').click(function() {
  $(this).toggleClass('active');
  var n = $(this).attr('data-for');
  if ($(this).hasClass('active')) {
    $('.summaries').children('.'+n).show(500);
  } else {
    $('.summaries').children('.'+n).hide(500);
  }
});

$(document).ready(function() {
  $('a.flapjax').click(function() {
    $('a.flapjax').toggleClass('active');
    $('.sidebar').toggleClass('visible');
    $('main').toggleClass('noscroll');
  });
  
  $('#SidebarSearchForm').submit(function() {
    var s = $('#SidebarSearch').val();
    var url = "http://thefpl.us/search?q="+s;
    window.location = url;
    preventDefault();
  });
  
  $('#SidebarSearch').keydown(function(e) {
    if (e.keyCode == 13) {
      var s = $('#SidebarSearch').val();
      var url = "http://thefpl.us/search?q="+s;
      window.location = url;
      e.preventDefault();
    }
  });
  
  $('figure.fanart').click(function() {
    $(this).toggleClass('big');
  });
});

// Handling social links (popups and corresponding analytics)
$('a.social').click(function(event) {
  var p = window.location.pathname;
  if ( $(this).hasClass('contribute') ) {
    sendGA("social", "Contribute", p, '1');
    window.open($(this).attr("href"));
  }
  if ( $(this).hasClass('twitter') ) {
    sendGA("social", "Twitter", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=440");
  } else if ( $(this).hasClass('googleplus') ) {
    sendGA("social", "Google+", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=650");
  } else if ( $(this).hasClass('flattr') ) {
    sendGA("social", "Flattr", p);
    window.open($(this).attr("href"), "popupWindow", "width=995,height=550");
  } else if ( $(this).hasClass('facebook') ) {
    sendGA("social", "Facebook", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=450");
  } else if ( $(this).hasClass('github') ) {
    sendGA("social", "GitHub", p);
    window.open($(this).attr("href"));
  }
});

// Google Analytics commands
$('audio').on('play', function(){
  var p = window.location.pathname;
  sendGA("listen", "play", p);
});
$('a.action.download').click(function() {
  var p = window.location.pathname;
  sendGA("listen", "download", p);
});
$('a.action.read').click(function() {
  var p = window.location.pathname;
  sendGA("listen", "document", p);
});
$('.sidebar .circles a').click(function() {
  if ( $(this).hasClass('twitter') ) {
    sendGA("social", "Twitter", "sidebar");
  } else if ( $(this).hasClass('ballpit') ) {
    sendGA("social", "ballp.it", "sidebar");
  } else if ( $(this).hasClass('flattr') ) {
    sendGA("social", "Flattr", "sidebar");
  } else if ( $(this).hasClass('rss') ) {
    sendGA("social", "Feedburner", "sidebar");
  }
});