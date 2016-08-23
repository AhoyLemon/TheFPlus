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
      var msg = post.message;
      var xtraContent = '';
      if (post.media.length > 0) {
        // This part adds thumbnails.
        for(var j=0, l=post.media.length; j<l; j++) {
          if (post.media[j].mediaType == "2") {
            // Image in comment
            xtraContent = xtraContent + ' <img src="'+post.media[j].thumbnailURL+'" class="thumbnail">';
          } else if (post.media[j].mediaType == "3") {
            // YouTube
            xtraContent = xtraContent + ' <div class="youtube-thumbnail" style="display:inline-block; position:relative"><img src="https://img.youtube.com/vi/'+post.media[j].location+'/3.jpg" class="thumbnail" alt="'+post.media[j].title+'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 71" style="position:absolute;width:60%;height:60%;top:20%;left:20%;opacity:.5"><style>.st0{fill:#FFF}</style><path class="st0" d="M97.7 15.7S96.7 9 93.8 6c-3.7-3.9-7.9-3.9-9.8-4.1-13.6-1-34.1-1-34.1-1s-20.4 0-34.1 1c-1.8.2-5.9.3-9.6 4.1-2.9 3-3.9 9.7-3.9 9.7s-1 7.9-1 15.8v7.4c0 7.9 1 15.8 1 15.8s1 6.7 3.9 9.7c3.7 3.9 8.6 3.8 10.7 4.2 7.8.7 33.1 1 33.1 1s20.5 0 34.1-1c1.9-.2 6.1-.2 9.8-4.1 2.9-3 3.9-9.7 3.9-9.7s1-7.9 1-15.8v-7.4c-.1-8-1.1-15.9-1.1-15.9zM39.9 47.8V20.4l26.3 13.7-26.3 13.7z"></path></svg></div>';
          } else if (post.media[j].mediaType == "1") {
            // External image source, usually imgur
            var urlPieces =  post.media[j].resolvedUrl.split('.');
            if (urlPieces[urlPieces.length-1].length < 5 ) {
              xtraContent = xtraContent + ' <div class="gif-thumb" style="display:inline-block; display: inline-block; border: 1px solid #444; font-size: 1.5em; padding: 0.2em 0.5em; background-color: #e5e972; text-transform:uppercase;">'+urlPieces[urlPieces.length-1]+'</div>';
            } else {
              xtraContent = xtraContent + ' <div class="gif-thumb" style="display:inline-block; display: inline-block; border: 1px solid #444; font-size: 1.5em; padding: 0.2em 0.5em; background-color: #e5e972;  text-transform:uppercase;">IMG</div>';
            }
          } else if (post.media[j].mediaType == "4") {
            // Link to external site.
            // Let's do nothing with this.
          } else if (post.media[j].mediaType == "5") {
            // Somebody posted a tweet. Let's try to handle this intelligently.
            xtraContent = xtraContent + '<span style="width:60px; height:60px; display:inline-block; color:#55acee;"><svg viewBox="0 0 100 100"><use class="bird inside" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#IconTwitter"></use></svg></span>';
          } else if (post.media[j].mediaType == "10") {
            xtraContent = xtraContent + '<span style="width:120px; height:60px; display:inline-block; color:#ff3a00;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 60"><path style="fill:#EF4123;" d="M2.8 34.5c-.2 0-.4.2-.5.5l-.8 6.4.8 6.3c0 .3.2.5.5.5.2 0 .4-.2.5-.5l1-6.3-1-6.4c-.1-.4-.3-.5-.5-.5zm4.7-3.6c0-.3-.2-.5-.5-.5-.2 0-.4.2-.5.5L5.4 41.3l1.1 10.2c.1.3.3.5.5.5s.4-.2.5-.5l1.3-10.2-1.3-10.4zm18-9.6c-.5 0-.9.4-.9.9l-.9 19.2.9 12.4c0 .5.4.9.9.9s.9-.4.9-.9l1-12.4-1-19.2c-.1-.5-.4-.9-.9-.9zM16.2 28c-.4 0-.7.3-.7.7l-1 12.7 1 12.3c0 .4.3.7.7.7.4 0 .6-.3.7-.7L18 41.4l-1.2-12.7c0-.4-.2-.7-.6-.7zm18.7 26.6c.6 0 1.1-.5 1.1-1.1l.9-12.2-.9-25.4c0-.6-.5-1.1-1.1-1.1-.6 0-1.1.5-1.1 1.1L33 41.4l.8 12.2c.1.5.6 1 1.1 1zm19.4.1c.8 0 1.5-.7 1.5-1.5l.6-11.8-.6-29.5c0-.8-.7-1.5-1.5-1.5s-1.5.7-1.5 1.5l-.6 29.4.6 11.8c0 .9.7 1.6 1.5 1.6zm-9.8-.1c.7 0 1.3-.6 1.3-1.3l.8-12-.8-25.7c0-.7-.6-1.3-1.3-1.3-.7 0-1.3.6-1.3 1.3l-.7 25.7.7 12c.1.8.6 1.3 1.3 1.3zm-23.7-.1c.4 0 .7-.3.8-.8l1.1-12.4-1.1-11.8c0-.4-.4-.8-.8-.8s-.8.3-.8.8l-1 11.8 1 12.4c.1.5.4.8.8.8zm-9.2-.7c.3 0 .5-.2.6-.6l1.2-11.9L12.2 29c0-.3-.3-.6-.6-.6s-.6.2-.6.6L9.9 41.4 11 53.3c.1.3.3.5.6.5zm37.8-38.6c-.8 0-1.4.6-1.4 1.4l-.6 24.8.6 11.9c0 .8.6 1.4 1.4 1.4.8 0 1.4-.6 1.4-1.4l.7-11.9-.7-24.8c-.1-.8-.7-1.4-1.4-1.4zM30.2 54.6c.5 0 1-.4 1-1l1-12.3-1-23.5c0-.5-.5-1-1-1s-1 .4-1 1l-.8 23.5.8 12.3c0 .6.5 1 1 1zm10.7-1.1l.8-12.1-.8-26.4c0-.7-.5-1.2-1.2-1.2-.6 0-1.2.5-1.2 1.2l-.7 26.4.7 12.1c0 .6.5 1.2 1.2 1.2.7-.1 1.2-.6 1.2-1.2zm62.2-27.3c-2 0-3.8.4-5.5 1.1-1.1-12.9-11.9-23-25-23-3.2 0-6.4.6-9.1 1.7-1.1.4-1.4.8-1.4 1.7V53c0 .9.7 1.6 1.5 1.7h39.5c7.9 0 14.3-6.4 14.3-14.3s-6.4-14.2-14.3-14.2zM59.2 7.7c-.9 0-1.6.7-1.6 1.6L57 41.4l.6 11.6c0 .9.7 1.6 1.6 1.6.9 0 1.6-.7 1.6-1.6l.7-11.7-.8-32.1c0-.8-.7-1.5-1.5-1.5z"/></svg></span>';
          } else {
            xtraContent = xtraContent + ' [extra content]';
          }
        }
      }
      // Change http links to https, if necessary
      if (post.url.indexOf("http://") > -1) {
        var urlSplit = post.url.split('http://');
        post.url = "https://"+urlSplit[1];
      }
      $commentDiv.append('<li><h5><a href="'+post.url+'">'+post.thread.clean_title+'</a></h5><blockquote>'+msg+xtraContent+' '+pScore+'</blockquote><cite>—<a href="https://disqus.com/home/user/'+post.author.username+'/" data-action="profile" data-user="'+post.author.id+'" data-username="'+post.author.username+'" data-role="username">'+post.author.name+'</a>, '+ago+'</cite></li>');
    }
    // Remove links in the text, they are unwanted.
    $('#CommentsPage blockquote a').contents().unwrap();
  });
});  
    </script>

  </article>

</main>

<?php snippet('footer') ?>