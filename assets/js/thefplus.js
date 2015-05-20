/* jshint -W117 */
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
});

// Handling social links (popups and corresponding analytics)
$('a.social').click(function(event) {
  var p = window.location.pathname;
  if ( $(this).hasClass('twitter') ) {
    ga('send', 'event', { eventCategory: 'social', eventAction: 'twitter', eventLabel: p });
    window.open($(this).attr("href"), "popupWindow", "width=550,height=440");
  } else if ( $(this).hasClass('googleplus') ) {
    ga('send', 'event', { eventCategory: 'social', eventAction: 'googleplus', eventLabel: p });
    window.open($(this).attr("href"), "popupWindow", "width=550,height=650");
  } else if ( $(this).hasClass('flattr') ) {
    ga('send', 'event', { eventCategory: 'social', eventAction: 'flattr', eventLabel: p });
    window.open($(this).attr("href"), "popupWindow", "width=995,height=550");
  } else if ( $(this).hasClass('facebook') ) {
    ga('send', 'event', { eventCategory: 'social', eventAction: 'facebook', eventLabel: p });
    window.open($(this).attr("href"), "popupWindow", "width=550,height=450");
  } else if ( $(this).hasClass('github') ) {
    ga('send', 'event', { eventCategory: 'social', eventAction: 'github', eventLabel: p });
    window.open($(this).attr("href"));
  }
  event.preventDefault();
});



// Google Analytics commands
$('audio').bind('play,ended', function(e){
  var s = $(this).attr('src');
  ga('send', 'event', { eventCategory: 'listen', eventAction: e.type, eventLabel:s });
});
$('a.action.download').click(function() {
  var s = $(this).attr('href');
  ga('send', 'event', { eventCategory: 'listen', eventAction: 'download', eventLabel:s });
});
$('.sidebar .circles a').click(function() {
  var h = $(this).attr('href');
  if ( $(this).hasClass('twitter') ) {
    ga('send', 'event', { eventCategory: 'outside-link', eventAction: 'twitter', eventLabel:h });
  } else if ( $(this).hasClass('ballpit') ) {
    ga('send', 'event', { eventCategory: 'outside-link', eventAction: 'ballpit', eventLabel:h });
  } else if ( $(this).hasClass('flattr') ) {
    ga('send', 'event', { eventCategory: 'outside-link', eventAction: 'flattr', eventLabel:h });
  } else if ( $(this).hasClass('rss') ) {
    ga('send', 'event', { eventCategory: 'outside-link', eventAction: 'feedburner', eventLabel:h });
  }
});