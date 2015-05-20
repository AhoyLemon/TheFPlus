<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      <h1><?php echo $page->title() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </article>
    
    <ol id="ContentSubmitted">
      
    </ol>
    
  </main>

<?php snippet('footer') ?>

<style>
  #ContentSubmitted { list-style-type:decimal; padding-left:2em; }
  #ContentSubmitted li { padding:.5em; }
  #ContentSubmitted li:nth-child(even) { background-color:#ddd; }
  span.submission { font-size:1.1em; }
  span.submitter { font-size:0.85em; }
  span.submitter:before { content:' submitted by '; }
</style>

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