/* jshint -W117 */

function sendGA(c, a, l, v) {
  if (v) {
    _paq.push(['trackEvent', c, a, l, v]);
    //ga('send', 'event', { eventCategory: c, eventAction: a, eventLabel: l, eventValue:v });
    //console.log('CATEGORY: '+c+', ACTION:'+a+', LABEL:'+l+', VALUE:'+v);
  } else if (l) {
    _paq.push(['trackEvent', c, a, l]);
    //ga('send', 'event', { eventCategory: c, eventAction: a, eventLabel: l });
    //console.log('CATEGORY: '+c+', ACTION:'+a+', LABEL:'+l);
  } else {
    _paq.push(['trackEvent', c, a]);
    //ga('send', 'event', { eventCategory: c, eventAction: a });
    //console.log('CATEGORY: '+c+', ACTION:'+a);
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
      var url = "https://thefpl.us/search?q="+s;
      window.location = url;
      e.preventDefault();
    }
  });
  
  $('figure.fanart').click(function() {
    $(this).toggleClass('big');
  });
});

var p = window.location.pathname;
if (p == "/episode/random") {
  p = '/episode/'+ $('h1 .episode-number').text() + ' (RANDOM)';
  console.log(p);
}
var episodePlayed = false;

// Handling social links (popups and corresponding analytics)
$('a.social').click(function(event) { 
  if ( $(this).hasClass('contribute') ) {
    sendGA("Contribute", "page link", p);
  } else if ( $(this).hasClass('twitter') ) {
    sendGA("share", "Twitter", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=440");
    event.preventDefault();
  } else if ( $(this).hasClass('facebook') ) {
    sendGA("share", "Facebook", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=450");
    event.preventDefault();
  } else if ( $(this).hasClass('tumblr') ) {
    sendGA("share", "tumblr", p);
  } else if ( $(this).hasClass('reddit') ) {
    sendGA("share", "Reddit", p);
  } else if ( $(this).hasClass('github') ) {
    sendGA("outside link", "GitHub", p);
  } else if ( $(this).hasClass('googleplus') ) {
    sendGA("share", "Google+", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=650");
    event.preventDefault();
  }
});


// Google Analytics commands
$('audio').on('play', function(){
  if (episodePlayed === false) {
    sendGA("listen", "play", p);
    episodePlayed = true;
  }
});

$('a.action.download').click(function() {
  sendGA("listen", "download", p);
});

$('a.action.read').click(function() {
  sendGA("read document", "document", p);
});

$('.sidebar .circles a').click(function() {
  if ( $(this).hasClass('twitter') ) {
    sendGA("outside link", "Twitter", "sidebar");
  } else if ( $(this).hasClass('ballpit') ) {
    sendGA("outside link", "ballp.it", "sidebar");
  } else if ( $(this).hasClass('youtube') ) {
    sendGA("outside link", "YouTube", "sidebar");
  } else if ( $(this).hasClass('rss') ) {
    sendGA("outside link", "Feedburner", "sidebar");
  }
});

$('#DonateButton').click(function() {
  var d = "$" + $('#DonationAmount').val();
  var v = $('#DonationAmount').val();
  sendGA("donate", "PayPal", d, v);
});