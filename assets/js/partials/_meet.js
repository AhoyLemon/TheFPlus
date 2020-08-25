if (window.location.pathname == "/meet" || window.location.pathname == "/meet/" || window.location.pathname == "/thefplus/meet") {
  let visiblePeople = [];

  if (!window.location.search) {
    visiblePeople.push('regular');
  }
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
    });
  }

  console.log(visiblePeople);
  $(document).ready(function (e) {
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
        //
        setTimeout(function(){ $('.'+n).addClass('hidden'); }, 700);
      }
      if (visiblePeople.length > 0) {
        history.replaceState(null, null, '/meet?'+visiblePeople.toString());
      } else {
        history.replaceState(null, null, '/meet');
      }
    });
  });
  
}