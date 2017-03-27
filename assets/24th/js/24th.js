// jshint -W117
// jshint -W041



var currentTotal = 0;

$('a[data-toggle="chat"]').click(function() {
  var t = $(this).attr('data-chat');
  if (t == "yes") { 
    $('#ChatHolder').hide();
    $('#DonationVertical').append($('.logo-box'));
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
      //alert(response[0].amount);
      $('.recent-donation .name').text(response[0].name);
      $('.recent-donation .amount').text('$'+response[0].amount);
      
      $('.recent-donation time').text(moment(response[0].created_at).local().format('LT'));
      if (response[0].message) {
        $('.recent-donation blockquote').text(response[0].message).show();
      } else {
        $('.recent-donation blockquote').hide();
      }
    }	
  });
  
  jQuery.ajax({
    type: "POST",
    url: '/json/fplus_donation.php',
    dataType: 'json',
    data: {'callGetDonationTotal' : ''},

    success: function(response) {
      console.log(response);
      
      currentTotal = parseFloat(response);
      $('.donation-total-box .dollars').text('$'+numberWithCommas(currentTotal));
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
      console.log(response);
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


function refreshInfo() {
  
  var now = moment();
  var then = moment("03/23/2017 11:25 CDT");
  
  
  var thisHour = moment.duration(now.diff(then)).hours();
  //console.log(moment.duration(now.diff(then)).hours());
  if (thisHour < 10) {
    thisHour = "0" + thisHour;
  }
  //console.log(moment(d).format())
  
  jQuery.ajax({
    type: "POST",
    url: '/24th/feed',
    dataType: 'json',

    success: function(response) {
      var info = response[0];
      console.log(response);
      
      // setCurrentHour
      $('[data-holds="current hour"]').text(thisHour);
      
      
      // Current document name (and link)
      if (info.current_doc == "") { 
        $('.doc-box').addClass('hidden');
      } else {
        if (info.current_doc_url != "") { 
          //$('[data-holds="document name"]').html('hello!');
        $('[data-holds="document name"]').html('<a href="'+info.current_doc_url+'" class="doc-link">'+info.current_doc+'</a>');
        } else {
          $('[data-holds="document name"]').html('<span>'+info.current_doc+'</span>');
        }        
        $('.doc-box').removeClass('hidden');
      }
      
      // Current document provider
      if (info.current_doc_provider == "") {
        ('.provider').addClass('hidden');
      } else {
        $('[data-holds="provider"]').text(info.current_doc_provider);
        $('.provider').removeClass('hidden');
      }
      
      
      // Current Readers
      
      $('.readers').attr('data-readers',info.current_readers);
      var readers = info.current_readers.split(',');
      $('.readers').empty();
      readers.forEach(function(reader) {
        $('.readers').append('<span class="name">'+reader+'</span>');
      });
      
      
      if (info.current_artist == "") {
        $('.artist').addClass('hidden');
      } else {
        $('[data-holds="artist name"]').text(info.current_artist);
        $('.artist').removeClass('hidden');
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
      
      // Text overlay? Sure, if you like.
      if (info.overlay_active == "true") {
        $('[data-holds="overlay_text"]').html(info.overlay_text);
        $('.text-overlay').removeClass('hidden');
      } else {
        $('.text-overlay').addClass('hidden');
      }
      
    }
    
  });
  
}


refreshInfo();
getDonations();