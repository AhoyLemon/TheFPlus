// jshint -W117

// @prepros-append partials/_meet.js


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

var p = window.location.pathname;
if (p == "/episode/random") {
  p = '/episode/'+ $('h1 .episode-number').text() + ' (RANDOM)';
}
var episodePlayed = false;


$(document).ready(function() {


  // Hide/Show the merch count, depending on if you've seen the merch page this session.
  if (typeof(Storage) !== "undefined") {
    // Code for localStorage/sessionStorage.
    if (sessionStorage.merchVisited) {
      // You've clicke the merch link this session.
    } else {
      $('.main-link .count').addClass('visible');
    }
    
    $('.merch-link').click(function() {
      sessionStorage.setItem('merchVisited', 'true');
    });
    
  } else {
    // There's no web storage
    $('.main-link .count').addClass('visible');
  }




  $('.logo-link').click(function() {
    $(this).toggleClass('active');
    $('.sidebar-links').toggleClass('active');
  });

  $('a.flapjax').click(function() {
    $('a.flapjax').toggleClass('active');
    $('.sidebar').toggleClass('visible');
    $('main').toggleClass('noscroll');
  });
  
  $('#SidebarSearchForm').submit(function() {
    var s = $('#SidebarSearch').val();
    var url = "https://thefpl.us/search?q="+s;
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





  // FOR THE /fanart page
  $('.full-fanart-link').click(function() {
    let src = $(this).attr('full-size');

    let artistName = $(this).attr('artist');
    let artistPage = $(this).attr('artist-page');
    let episodeTitle = $(this).attr('episode-title');
    let episodeURL = $(this).attr('episode-url');

    let altText = $(this).children('img').attr('alt');


    if (artistPage) {
      $('#FullFanartArtistLink').attr('href', artistPage).text(artistName);
      $('#FullFanartArtistLink').show();
      $('#FullFanartArtistName').hide();
    } else if (artistName) {
      $('#FullFanartArtistName').text(artistName);
      $('#FullFanartArtistLink').hide();
      $('#FullFanartArtistName').show();
    } else {
      $('#FullFanartArtistLink').hide();
      $('#FullFanartArtistName').hide();
    }

    if (episodeURL) {
      $('#FullFanartEpisodeLink').attr('href', episodeURL).text(episodeTitle);
      $('#FullFanartEpisodeLink').show();
      $('#FullFanartEpisodeName').hide();
    } else if (episodeTitle) {
      $('#FullFanartEpisodeName').text(artistName);
      $('#FullFanartEpisodeLink').hide();
      $('#FullFanartEpisodeName').show();
    } else {
      $('#FullFanartEpisodeLink').hide();
      $('#FullFanartEpisodeName').hide();
    }

    $('#FullFanartImg').attr('src',src);
    $('#FullFanartImg').attr('alt', altText);
    $('.full-image-wrapper').addClass('visible');
    
  });

  $('.full-image-outer, #CloseFullImage').click(function() {
    $('.full-image-wrapper').removeClass('visible');
  });


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

  // Read a document
  $('a.action.read').click(function() {
    trackEvent("read document", "document", p);
  });

  // Visit ballpit thread
  $('a.action.ballpit').click(function() {
    trackEvent("ballpit thread", "ballpit", p);
  });

  // Use donation form.
  $('#DonateButton').click(function() {
    var d = "$" + $('#DonationAmount').val();
    var v = $('#DonationAmount').val();
    trackEvent("donate", "PayPal", d, v);
  });

});

/*
// Play an episode
$('audio').on('play', function(){
  if (episodePlayed === false) {
    trackEvent("listen", "play", p);
    episodePlayed = true;
  }
});

// Download an episode
$('a.action.download').click(function() {
  trackEvent("listen", "download", p);
});
*/