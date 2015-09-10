<?php snippet('header') ?>

<main class="main page" role="main">

  <article class="full default">
    <?php echo $page->text()->kirbytext() ?>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.0/jquery.timeago.min.js"></script>
    <script>
$(document).ready(function() {
  $commentDiv = $("#CommentsPage");

  $.get("https://disqus.com/api/3.0/forums/listPosts.json?forum=thefplus&limit=20&related=thread&api_key=RzacHatO5AX9Lg0qexKqWCIXkbitwPo52meOZiGbYQW9fpETiLIjCWVb3S4Nrc4L", function(res, code) {
    //Good response?
    for(var i=0, len=res.response.length; i<len; i++) {
      var post = res.response[i];
      var ago = jQuery.timeago(post.createdAt+"+0000");
      var xtraContent = "";
      console.dir(post);
      var pScore = "";
      if (post.points > 0) {
        pScore = '<span class="score positive">'+post.points+'</span>'
      } else if (post.points < 0) {
        pScore = '<span class="score negative">'+post.points+'</span>'
      } else {
        pScore = "";
      }
      var msg = post.raw_message;
      var xtraContent = '';
      if (post.media.length > 0) {
        // This part adds thumbnails.
        for(var j=0, l=post.media.length; j<l; j++) {
          if (post.media[j].mediaType == "2") {
            // Image in comment
            xtraContent = xtraContent + ' <img src="'+post.media[j].thumbnailURL+'" class="thumbnail">';
          } else if (post.media[j].mediaType == "3") {
            // YouTube
            xtraContent = xtraContent + ' <div class="youtube-thumbnail" style="display:inline-block; position:relative"><img src="http://img.youtube.com/vi/'+post.media[j].location+'/3.jpg" class="thumbnail" alt="'+post.media[j].title+'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 71" style="position:absolute;width:60%;height:60%;top:20%;left:20%;opacity:.5"><style>.st0{fill:#FFF}</style><path class="st0" d="M97.7 15.7S96.7 9 93.8 6c-3.7-3.9-7.9-3.9-9.8-4.1-13.6-1-34.1-1-34.1-1s-20.4 0-34.1 1c-1.8.2-5.9.3-9.6 4.1-2.9 3-3.9 9.7-3.9 9.7s-1 7.9-1 15.8v7.4c0 7.9 1 15.8 1 15.8s1 6.7 3.9 9.7c3.7 3.9 8.6 3.8 10.7 4.2 7.8.7 33.1 1 33.1 1s20.5 0 34.1-1c1.9-.2 6.1-.2 9.8-4.1 2.9-3 3.9-9.7 3.9-9.7s1-7.9 1-15.8v-7.4c-.1-8-1.1-15.9-1.1-15.9zM39.9 47.8V20.4l26.3 13.7-26.3 13.7z"></path></svg></div>';
          } else if (post.media[j].mediaType == "1") {
            // External image source, usually imgur
            var urlPieces =  post.media[j].resolvedUrl.split('.');
            if (urlPieces[urlPieces.length-1].length < 5 ) {
              xtraContent = xtraContent + ' <div class="gif-thumb" style="display:inline-block; display: inline-block; border: 1px solid #444; font-size: 1.5em; padding: 0.2em 0.5em; background-color: #e5e972; text-transform:uppercase;">'+urlPieces[urlPieces.length-1]+'</div>';
            } else {
              xtraContent = xtraContent + ' <div class="gif-thumb" style="display:inline-block; display: inline-block; border: 1px solid #444; font-size: 1.5em; padding: 0.2em 0.5em; background-color: #e5e972;  text-transform:uppercase;">IMG</div>';
            }
          } else {
            xtraContent = xtraContent + ' [extra content]';
          }
        }
      }
      $commentDiv.append('<li><h5><a href="'+post.url+'">'+post.thread.clean_title+'</a></h5><blockquote><p>'+msg+'</p>'+xtraContent+' '+pScore+'</blockquote><cite>—<a href="https://disqus.com/home/user/'+post.author.username+'/" data-action="profile" data-user="'+post.author.id+'" data-username="'+post.author.username+'" data-role="username">'+post.author.name+'</a>, '+ago+'</cite></li>');
    }
  });
});  
    </script>

  </article>

</main>

<?php snippet('footer') ?>