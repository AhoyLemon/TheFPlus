// jshint -W117

// @prepros-append partials/_meet.js



// This is the markup for the modal.
// Generate the markup    
const markupOpen = `
<div id="ImageModal" class="image-modal">
  <div class="image-modal-outer">
    <div class="image-modal-dropsheet" id="ImageModalDropsheet"></div>
    <div class="image-modal-inner">
      <button class="close-modal" id="CloseModal">
        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M16 17a1 1 0 01-.707-.293l-8-8a1 1 0 111.414-1.414l8 8A1 1 0 0116 17z"/>
          <path d="M8 17a1 1 0 01-.707-1.707l8-8a1 1 0 111.414 1.414l-8 8A1 1 0 018 17z"/>
        </svg>
      </button>`;

const markupClose =`
    </div>
  </div>
</div>`;






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


  // FOR THE /fanart page
  $('.full-fanart-link').click(function() {
    let src = $(this).attr('full-size');

    let artistName = $(this).attr('artist');
    let artistPage = $(this).attr('artist-page');
    let episodeTitle = $(this).attr('episode-title');
    let episodeURL = $(this).attr('episode-url');

    let altText = $(this).children('img').attr('alt');

    let imgElement = '<figure><img src="'+src+'" alt="'+altText+'" /></figure>';
    let figcaption = '<figcaption>';

    // Display Artist
    if (artistPage) {
      figcaption += '<p>Artist: <a href="'+artistPage+'">'+artistName+'</a></p>';
    } else if (artistName) {
      figcaption += '<p>Artist: <strong>'+artistName+'</strong></p>';
    }

    // Display Episode
    if (episodeURL) {
      figcaption += '<p>Episode: <a href="'+episodeURL+'">'+episodeTitle+'</a></p>';
    } else if (episodeTitle) {
      figcaption += '<p>Episode <strong>'+episodeTitle+'</strong></p>';
    }
    figcaption += '</figcaption>';

    

    let markup = "";
    
    markup += markupOpen;
    markup += imgElement;
    markup += figcaption;
    markup += markupClose;

    $('body').append(markup);
  });


  $('.zoom-photo').click(function() {
    let src = $(this).attr('full-size');
    let altText =$(this).children('img').attr('alt');
    let imgElement = '<figure><img src="'+src+'" alt="'+altText+'" /></figure>';
    let markup = "";
    
    markup += markupOpen;
    markup += imgElement;
    markup += markupClose;
    $('body').append(markup);
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


$(document).on('click', '#CloseModal', function() {
  $('#ImageModal').remove();
});
$(document).on('click', '#CloseModalDropsheet', function() {
  $('#ImageModal').remove();
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