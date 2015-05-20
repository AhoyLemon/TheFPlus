window.onload = function() { init() };

var public_spreadsheet_url = 'https://docs.google.com/spreadsheet/pub?hl=en_US&hl=en_US&key=1OGqSd1-I8HoHrSxRWtgl7MBLH2Q9_cBHPV6aF9Ij1lA&output=html';

function init() {
  Tabletop.init( { key: public_spreadsheet_url,
                  callback: showInfo,
                  simpleSheet: true } )
}

function showInfo(data, tabletop) {
  alert("Successfully processed!")
  console.log(data);
  $.each(data, function(i, issue) {
    if (issue.status == "complete") {
      $('#CompletedIssues').prepend('<dt>'+issue.title+' ('+issue.type+')</dt>');
    } else if (issue.status == "in progress") {
      $('#IssuesInProgress').prepend('<dt>'+issue.title+' ('+issue.type+')</dt>');
    } else if (issue.status == "known") {
      $('#KnownIssues').prepend('<dt>'+issue.title+' ('+issue.type+')</dt>');
    } else if (issue.status == "ignored") {
      $('#IgnoredIssues').prepend('<dt>'+issue.title+' ('+issue.type+')</dt>');
    }
  });
}