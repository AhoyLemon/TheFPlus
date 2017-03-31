// jshint -W117
// jshint -W041

var currentTotal = 0;
var marathonStart = moment("03/31/2017 18:00 CDT");

var current = {
  total: 0,
  text_under_button: "",
  current_doc: "",
  current_doc_url: "",
  current_doc_provider: "",
  current_readers: "",
  current_artist: "",
  break_active: "",
  break_label: "",
  break_time: "",
  last_donation_id: 0,
  info_active: false,
  info_text: "",
  counter_active: "",
  counter_label: "",
  counter_number: "",
  overlay_active: "",
  overlay_text: ""
};

$('a[data-toggle="chat"]').click(function() {
  var t = $(this).attr('data-chat');
  if (t == "yes") { 
    $('#ChatHolder').hide();
    $('#DonationVertical').append($('.logo-box'));
    $('#DonationVertical').append($('.explanation-box'));
    $('#DonationVertical').append($('.donation-total-box'));
    $('#DonationVertical').append($('.recent-donation'));
    $('#DonationVertical').append($('.donation-button'));
    $('footer').addClass('shorter');
    $('main').addClass('taller');
    $('#DonationVertical').show();
    $(this).attr('data-chat', 'no');
    $('a[data-toggle="chat"]').text('show chat');
  } else {
    $('#ChatHolder').show();
    $('footer').append($('.logo-box'));
    $('#FooterGrid').append($('.donation-total-box'));
    $('#FooterGrid').append($('.recent-donation'));
    $('#FooterGrid').append($('.donation-button'));
    $('footer').append($('.explanation-box'));
    $('footer').removeClass('shorter');
    $('main').removeClass('taller');
    $('#DonationVertical').hide();
    $(this).attr('data-chat', 'yes');
    $('a[data-toggle="chat"]').text('dismiss chat');
  }
});

$('body').on('click', '.button', function() {

  var sWidth = $(window).width();
  var sHeight = $(window).height();
  var top = 20;
  var pWidth = 666;
  var pHeight = 802;
  var lef = ((sWidth / 2) - (pWidth / 2));
  _paq.push(['trackEvent', "Donation Button", "Clicked"]);
  window.open($(this).attr("href"), "popupWindow", "width="+pWidth+",height="+pHeight+",top="+top+",left="+lef);
  return false;
});

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function getDonations() {
  jQuery.ajax({
    type: "POST",
    url: '/json/fplus_donation.php',
    dataType: 'json',
    data: {'callGetDonations' : ''},

    success: function(response) {
      console.log(response);
      if (response[0] && response[0].id != current.last_donation_id) {
        current.last_donation_id = response[0].id;
        $('.recent-donation .name').text(response[0].name);
        $('.recent-donation .amount').text('$'+response[0].amount);
        $('.recent-donation time').text(moment(response[0].created_at).local().format('LT'));
        if (response[0].message) {
          $('.recent-donation blockquote').text(response[0].message).show();
        } else {
          $('.recent-donation blockquote').hide();
        }
        $('.recent-donation.box').removeClass('transparent');
      }
    }	
  });
  
  jQuery.ajax({
    type: "POST",
    url: '/json/fplus_donation.php',
    dataType: 'json',
    data: {'callGetDonationTotal' : ''},

    success: function(response) {
      //console.log(response);
      if (response != current.total) {
        current.total = response;
        currentTotal = parseFloat(response);
        $('.donation-total-box .dollars').text('$'+numberWithCommas(currentTotal));
      }
      if (currentTotal != 0) {
        $('.donation-total-box').removeClass('hidden');
      }
    }
  });

}


function getBattle(qa, qb) {
  jQuery.ajax({
      type: "POST",
      url: '/json/fplus_donation.php',
      dataType: 'json',
      data: {'callGetBattleTotals' : '' ,
         'battlestr1' : qa ,
         'battlestr2' : qb },
    success: function(response) { 
      $('.versus-stripe .blue .label').text(response[0].name);
      $('.versus-stripe .blue .amount').text('$'+numberWithCommas(response[0].amount));
      
      $('.versus-stripe .red .label').text(response[1].name);
      $('.versus-stripe .red .amount').text('$'+numberWithCommas(response[1].amount));
      
      $('.versus-stripe').removeClass('hidden');
      
      if (parseFloat(response[0].amount) > parseFloat(response[1].amount)) {
        $('.versus-stripe .blue').addClass('bigger');
        $('.versus-stripe .red').removeClass('bigger');
      } else if (parseFloat(response[0].amount) < parseFloat(response[1].amount)) {
        $('.versus-stripe .red').addClass('bigger');
        $('.versus-stripe .blue').removeClass('bigger');
      }
      
    }
  });
}


function showAllDonations() {
  
  $('#FullDonationList').empty();
  
  jQuery.ajax({
    type: "POST",
    url: '/json/fplus_donation.php',
    dataType: 'json',
    data: {'callGetAllDonations' : ''},

    success: function(response) {
      console.log(response);
      if (response[0]) {
        for (var i = 0, len = response.length; i < len; i++) {
          
          var h = '<li class="donation">';
          h = h +'<span>'+response[i].name+'</span>';
          h = h + ' gave ';
          h = h + '<span class="amount">$'+response[i].amount+'</span>';
          h = h + ' at ';
          h = h + '<time>'+moment(response[i].created_at).local().format('LT')+'</time>';
          if (response[i].message) { 
            h = h + '<blockquote>'+response[i].message+'</blockquote>';
          }
          h = h + '</li>';
          $('#FullDonationList').append(h);
          
        }
        
        $('.list-all-donations').addClass('visible');
        
      }
    }	
  });
  
}

$('[data-show="list-all-donations"]').click(function() {
  showAllDonations();
});
$('[data-hide="list-all-donations"]').click(function() {
  $('.list-all-donations').removeClass('visible');
});


function refreshInfo() {
  
  var now = moment();
  var thisHour = Math.ceil(moment.duration(now.diff(marathonStart)).asHours()) + 1;
  if (thisHour < 10 && thisHour > -1) {
    thisHour = "0" + thisHour;
  }
  else if (thisHour > 24) {
    thisHour = "∞";
  }
  //console.log(moment(d).format())
  
  jQuery.ajax({
    type: "POST",
    url: '/24th/feed',
    dataType: 'json',

    success: function(response) {
      var info = response[0];
      console.log(info);
      
      // Stream info text
      if (info.text_under_button && info.text_under_button != current.text_under_button) {
        current.text_under_button = info.text_under_button;
        $('[data-holds="text_under_button"]').html(info.text_under_button);
        $('[data-holds="text_under_button"]').removeClass('hidden');
      } else {
        $('[data-holds="text_under_button"]').addClass('hidden');
      }     
 
      // setCurrentHour
      $('[data-holds="current hour"]').text(thisHour);
      
      
      // Current document name (and link)
      if (info.current_doc == "") { 
        $('.doc-box').addClass('hidden');
      } else if (info.current_doc != current.current_doc || info.current_doc_url != current.current_doc_url) {
        current.current_doc = info.current_doc;
        current.current_doc_url = info.current_doc_url;
        if (info.current_doc_url != "") { 
          $('[data-holds="document name"]').html('<a href="'+info.current_doc_url+'" class="doc-link">'+info.current_doc+'</a>');
        } else {
          $('[data-holds="document name"]').html('<span>'+info.current_doc+'</span>');
        }        
        $('.doc-box').removeClass('hidden');
      }
      
      // Current document provider
      if (info.current_doc_provider == "") {
        ('.provider').addClass('hidden');
      } else if (info.current_doc_provider != current.current_doc_provider)  {
        current.current_doc_provider = info.current_doc_provider;
        $('[data-holds="provider"]').text(info.current_doc_provider);
        $('.provider').removeClass('hidden');
      }
      
      
      // Current Readers
      if (current.current_readers != info.current_readers) {
        current.current_readers = info.current_readers;
        var readers = info.current_readers.split(',');
        $('.readers').empty();
        readers.forEach(function(reader) {
          $('.readers').append('<span class="name">'+reader+'</span>');
        });
      }
      
      // Current Artist
      if (current.current_artist != info.current_artist) {
        current.current_artist = info.current_artist;
        if (info.current_artist == "") {
          $('.artist').addClass('hidden');
        } else {
          $('[data-holds="artist name"]').text(info.current_artist);
          $('.artist').removeClass('hidden');
        }
      }
      
      // Are we on a break?
      if (info.break_active == "true" && info.break_active != current.break_active) {
        current.break_active = info.break_active;
        if (current.break_label != info.break_label || current.break_time != info.break_time) {
          current.break_label = info.break_label;
          current.break_time = info.break_time;
          $('[data-holds="break_label"]').text(info.break_label);
          var b = moment().format('MM/DD/YYYY') + " " + info.break_time + " CDT";
          var t = moment(b).local().format('h:mmA');
          $('[data-holds="break_time"]').text(t);
        }
        $('.on-break').removeClass('hidden');
      } else if (info.break_active != current.break_active) {
        current.break_active = info.break_active;
        $('.on-break').addClass('hidden');
      }
      
      // DONATION GOAL METER...
      if (info.goal_active == "true") {
        
        // set goal title
        $('[data-holds="goal_title"]').text(info.goal_title);
        
        // set goal max
        $('[data-holds="goal_max"]').text('$'+numberWithCommas(info.goal_max));
        
        // show current total
        $('[data-holds="currentTotal"]').text('$'+numberWithCommas(currentTotal));
        
        // heat math
        var n = parseInt(info.goal_min);
        var x = parseInt(info.goal_max);
        
        var pct = ((currentTotal - n) / (x - n) * 100);
        
        if (pct >= 100) {
          $('.heat').css('height', '100%');
          $('.donation-goal').addClass('goal-met');
        } else {
          $('.heat').css('height', pct+'%');
          $('.donation-goal').removeClass('goal-met');
        }
        
        // show the heat div
        $('.donation-goal').removeClass('hidden');
        
      } else {
        // show the heat div
        $('.donation-goal').addClass('hidden');
      }
      
      
      // If there's a current battle, run getBattle() with the values.
      if (info.battle_active == "true") {
        getBattle(info.battle_query_a, info.battle_query_b);
      } else {
        $('.versus-stripe').addClass('hidden');
      }
      
      
      // OSD Counter
      if (info.counter_active == "true") {
        current.counter_active = info.counter_active;
        if (current.counter_label != info.counter_label || current.counter_number != info.counter_number) {
          current.counter_label = info.counter_label;
          current.counter_number = info.counter_number;
          $('[data-holds="counter_label"]').text(current.counter_label);
          $('[data-holds="counter_number"]').text(current.counter_number);
        }
        $('.osd-counter').removeClass('hidden');
      } else {
        current.counter_active = info.counter_active;
        $('.osd-counter').addClass('hidden');
      }
      
      // TEXT OVERLAY
      if (info.overlay_active == "true") {
        current.overlay_active = info.overlay_active;
        if (current.overlay_text != info.overlay_text) {
          current.overlay_text = info.overlay_text;
          $('[data-holds="overlay_text"]').html(current.overlay_text);
        }
        $('.text-overlay').removeClass('hidden');
      } else {
        current.overlay_active = info.overlay_active;
        $('.text-overlay').addClass('hidden');
      }
      
    }
    
  });
  
}


refreshInfo();
getDonations();
