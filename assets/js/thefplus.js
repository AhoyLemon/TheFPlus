// jshint -W117

function trackEvent(c, a, l, v) {
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
}
var episodePlayed = false;

// Handling social links (popups and corresponding analytics)
$('a.social').click(function(event) { 
  if ( $(this).hasClass('contribute') ) {
    trackEvent("Contribute", "page link", p);
  } else if ( $(this).hasClass('twitter') ) {
    trackEvent("share", "Twitter", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=440");
    event.preventDefault();
  } else if ( $(this).hasClass('facebook') ) {
    trackEvent("share", "Facebook", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=450");
    event.preventDefault();
  } else if ( $(this).hasClass('tumblr') ) {
    trackEvent("share", "tumblr", p);
  } else if ( $(this).hasClass('reddit') ) {
    trackEvent("share", "Reddit", p);
  } else if ( $(this).hasClass('github') ) {
    trackEvent("outside link", "GitHub", p);
  } else if ( $(this).hasClass('googleplus') ) {
    trackEvent("share", "Google+", p);
    window.open($(this).attr("href"), "popupWindow", "width=550,height=650");
    event.preventDefault();
  }
});

// Google Analytics commands
$('audio').on('play', function(){
  if (episodePlayed === false) {
    trackEvent("listen", "play", p);
    episodePlayed = true;
  }
});

$('a.action.download').click(function() {
  trackEvent("listen", "download", p);
});

$('a.action.read').click(function() {
  trackEvent("read document", "document", p);
});

$('.sidebar .circles a').click(function() {
  if ( $(this).hasClass('twitter') ) {
    trackEvent("outside link", "Twitter", "sidebar");
  } else if ( $(this).hasClass('ballpit') ) {
    trackEvent("outside link", "ballp.it", "sidebar");
  } else if ( $(this).hasClass('youtube') ) {
    trackEvent("outside link", "YouTube", "sidebar");
  } else if ( $(this).hasClass('rss') ) {
    trackEvent("outside link", "Feedburner", "sidebar");
  }
});

$('#DonateButton').click(function() {
  var d = "$" + $('#DonationAmount').val();
  var v = $('#DonationAmount').val();
  trackEvent("donate", "PayPal", d, v);
});


// Register the service worker
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
    // Registration was successful
    console.log('ServiceWorker registration successful with scope: ', registration.scope);
  }).catch(function(err) {
    // registration failed :(
    console.log('ServiceWorker registration failed: ', err);
  });
}

