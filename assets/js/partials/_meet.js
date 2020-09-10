
// Are you on the meet page?
if (window.location.pathname == "/meet" || window.location.pathname == "/meet/" || window.location.pathname == "/thefplus/meet") {

  // If so, let's get the variables of your page and the search variables.
  var meetPage = "";
  if (window.location.pathname == "/meet" || window.location.pathname == "/meet/") {
    meetPage = "/meet";
  } else if (window.location.pathname == "/thefplus/meet") {
    meetPage = "/thefplus/meet";
  }

  let visiblePeople = [];

  if (!window.location.search) {
    visiblePeople.push('regular');
  }

  $(document).ready(function (e) {

    // Okay, on page load, if you've got a query string, let's read that and hide/show people accordingly.
    if (window.location.search) {
      visiblePeople = window.location.search.replace('?','').split(",");
      console.log(visiblePeople);
  
      if (!visiblePeople.includes('regular')) {
        $('.regular').addClass('hidden');
        $('a[data-for="regular"]').removeClass('active');
      }

      visiblePeople.forEach(function(p) {
        $('.'+p).removeClass('hidden');
        $('a[data-for="'+p+'"]').addClass('active');
        console.log(p+ ' are visible');
      });

    }

    // And then if you click a toggle, let's hide/show that group of people
    // and also pushState your new query.
    $('.toggle a').click(function() {
      console.log(visiblePeople);
      $(this).toggleClass('active');
      var n = $(this).attr('data-for');
      if ($(this).hasClass('active')) {
        visiblePeople.push(n);
        $('.'+n).removeClass('hidden hide').addClass('show');
      } else {
        visiblePeople = visiblePeople.filter(item => item !== n);
        $('.'+n).removeClass('hidden show').addClass('hide');
        setTimeout(function(){ $('.'+n).addClass('hidden'); }, 700);
      }
      if (visiblePeople.length > 0) {
        history.pushState(null, null, meetPage + '?' + visiblePeople.toString());
      } else {
        history.pushState(null, null, meetPage);
      }
    });
  });
  
}