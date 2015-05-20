<link rel="stylesheet" href="http://thefpl.us/assets/css/issues.css" />
<script type="text/javascript" src="http://thefpl.us/assets/js/vendor/tabletop.js"></script>
<script type="text/javascript">
  window.onload = function() { init() };
  $('#LoadingIssues').text('Loading issues...');

  var public_spreadsheet_url = 'https://docs.google.com/spreadsheet/pub?hl=en_US&hl=en_US&key=1OGqSd1-I8HoHrSxRWtgl7MBLH2Q9_cBHPV6aF9Ij1lA&output=html';

  function init() {
    Tabletop.init( { key: public_spreadsheet_url,
                    callback: showInfo,
                    simpleSheet: true } )
  }

  function showInfo(data, tabletop) {
    console.log(data);
    $.each(data, function(i, issue) {
      if (issue.status == "complete") {
        $('#CompletedIssues').prepend('<dt><span class="title">'+issue.title+'</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span><span class="date">issue resolved: '+issue.date+'</span></dd>');
      } else if (issue.status == "in progress") {
        $('#IssuesInProgress').prepend('<dt><span class="title">'+issue.title+'</span> <span class="in-progress">in progress</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span></dd>');
      } else if (issue.status == "known") {
        $('#KnownIssues').prepend('<dt><span class="title">'+issue.title+'</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span></dd>');
      } else if (issue.status == "ignored") {
        $('#IgnoredIssues').prepend('<dt><span class="title">'+issue.title+'</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span></dd>');
      }
    });
    $('#LoadingIssues').remove();
    $('.issues-nav').removeClass('hidden');
  }
  
  $('.issues-nav button').click(function() {
    var show = $(this).attr('data-for');
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    if ( show == "all" ) {
      $('.issue-box').slideDown(300);
    } else {
      $('.issue-box[data-contains='+show+']').slideDown(300);
      $('.issue-box:not([data-contains='+show+'])').slideUp(300);
    }
  });
</script>