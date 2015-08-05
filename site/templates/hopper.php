<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      <h1><?php echo $page->title() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </article>

    <ul class="submitted-content dump">
      <li class="thead">
        <span class="th"></span>
        <span class="th">Document</span>
        <span class="th">submitted by</span>
        <span class="th">submitted on</span>
      </li>
      <?php foreach($page->builder()->toStructure()->sortBy('subdate', 'desc') as $section): ?>
        <li>
          <span class="number-cell"></span>
          <?php if ((param('show') == "links")) { ?>
            <a class="submission" href="<?php echo $section->docurl(); ?>" target="_blank">
              <?php echo $section->title(); ?>
            </a>
          <?php } else { ?>
            <span class="submission">
              <?php echo $section->title(); ?>
            </span>
          <?php } ?>
          <span class="submitter">
            <?php $meetslug = strtolower(preg_replace('/\s+/', '-', $section->submitter())); ?>
            <?php if($site->find('meet/'.$meetslug)){ ?>
              <a href="/meet/<?php echo $meetslug; ?>"><?php echo $section->submitter() ?></a>
            <?php } else { ?>
              <?php echo $section->submitter() ?>
            <?php } ?>
          </span>
          <?php if ($section->subdate() != "") { ?>
            <time class="submitted-date">
              <?php $docdate = strtotime($section->subdate()); ?>
              <?php echo date('F jS, Y', $docdate); ?>
            </time>
          <?php } else { ?>
            <span class="submitted-date blank"></span>
          <?php } ?>
        </li>
      <?php endforeach ?>
    </ul>
    
  </main>

<?php snippet('footer') ?>

<style>
  ul.submitted-content { counter-reset:docNumber -1; }
    ul.submitted-content li { counter-increment: docNumber; }
    ul.submitted-content .number-cell { width:1em; text-align:right; }
    ul.submitted-content .number-cell:before { content: counter(docNumber); }
  /*
  .submitted-content { list-style-type:decimal; padding-left:2em; }
    .submitted-content li { padding:.5em; }
      .submitted-content li:nth-child(even) { background-color:#ddd; }
  */
    .submitted-content a { text-decoration:none; }
      .submitted-content a:hover { text-decoration:underline; }
  /*
  span.submission { font-size:1.1em; }
  span.submitter { font-size:0.85em; }
  span.submitter:before { content:' submitted by '; }
  */
</style>

<!--
<script type="text/javascript" src="http://thefpl.us/assets/js/vendor/tabletop.js"></script>
<script type="text/javascript">
  window.onload = function() { init() };
  $('#LoadingContent').text('Loading documents...');

  var public_spreadsheet_url = 'https://docs.google.com/spreadsheet/pub?key=0ApOT20mhinGpdFJEUllGOFUtWjEweURzNTNRMzB6NXc&single=true&gid=0&range=A2%3AB150&output=csv';

  function init() {
    Tabletop.init( { key: public_spreadsheet_url,
                    callback: showInfo,
                    simpleSheet: true } )
  }

  function showInfo(data, tabletop) {
    console.log(data);
    data.reverse();
    $('#LoadingContent').remove();
    $.each(data, function(i, content) {
      $('#ContentSubmitted').append('<li><span class="submission">'+content.document+'</span><span class="submitter">'+content.submitter+'</span></li>');
      /**
      if (issue.status == "complete") {
        $('#CompletedIssues').prepend('<dt><span class="title">'+issue.title+'</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span><span class="date">issue resolved: '+issue.date+'</span></dd>');
      } else if (issue.status == "in progress") {
        $('#IssuesInProgress').prepend('<dt><span class="title">'+issue.title+'</span> <span class="in-progress">in progress</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span></dd>');
      } else if (issue.status == "known") {
        $('#KnownIssues').prepend('<dt><span class="title">'+issue.title+'</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span></dd>');
      } else if (issue.status == "ignored") {
        $('#IgnoredIssues').prepend('<dt><span class="title">'+issue.title+'</span> <span class="type">'+issue.type+'</span></dt><dd><span class="description">'+issue.description+'</span></dd>');
      }
      **/
    });
  }
</script>
-->

<!--

<script>
    $(document).ready(function() {
      $.get("https://docs.google.com/spreadsheet/pub?key=0ApOT20mhinGpdFJEUllGOFUtWjEweURzNTNRMzB6NXc&single=true&gid=0&range=A2%3AB150&output=csv",function(data,status){
        var hopper = data.split('\n');
        hopper.reverse();
        var i;
        for (i = 0; i < hopper.length; ++i) {
          var piece = hopper[i].split(',');
          if (piece[0] == "") {
            // do nothing
          } else if (piece[2] == "") {
            $('#ContentSubmitted').append('<li><span class="submission">'+piece[0]+'</span></li>');
          } else {
            $('#ContentSubmitted').append('<li><span class="submission">'+piece[0]+'</span><span class="submitter">'+piece[1]+'</span></li>');
          }
        }
      });
    });
  </script>

<script>
    $(document).ready(function() {
      $.get("https://docs.google.com/spreadsheets/d/1tLUrK0uXGeJHxoJbf_n4S5S6vDK8_HMo5EAs3nD3oPY/export?format=csv&id=1tLUrK0uXGeJHxoJbf_n4S5S6vDK8_HMo5EAs3nD3oPY&gid=1672283804",function(data,status){
        alert(data);
        var hopper = data.split('\n');
        hopper.reverse();
        var i;
        for (i = 0; i < hopper.length; ++i) {
          var piece = hopper[i].split(',');
          $('#KnownIssues tbody').append('<tr><td>'+piece[0]+'</td><td>'+piece[1]+'</td><td>'+piece[2]+'</td><td>'+piece[3]+'</td><td>'+piece[4]+'</td></tr>');
        }
      });
    });
  </script>

-->