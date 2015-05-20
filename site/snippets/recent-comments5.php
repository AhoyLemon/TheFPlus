
<script>

  $(document).ready(function() {
    $commentDiv = $("#CommentsPage");

    $.get("https://disqus.com/api/3.0/forums/listPosts.json?forum=thefplus&limit=20&related=thread&api_key=RzacHatO5AX9Lg0qexKqWCIXkbitwPo52meOZiGbYQW9fpETiLIjCWVb3S4Nrc4L", function(res, code) {
      //Good response?
      for(var i=0, len=res.response.length; i<len; i++) {
        var post = res.response[i];
        var ago = jQuery.timeago(post.createdAt);
        //alert(ago);
        console.dir(post);
        var pScore = "";
        if (post.points > 0) {
          pScore = '<span class="score positive">'+post.points+'</span>'
        } else if (post.points < 0) {
          pScore = '<span class="score negative">'+post.points+'</span>'
        } else {
          pScore = "";
        }
        $commentDiv.append('<li><h5><a href="'+post.url+'">'+post.thread.clean_title+'</a></h5><blockquote>'+post.message+' '+pScore+'</blockquote><cite>—<a href="https://disqus.com/home/user/'+post.author.username+'/" data-action="profile" data-user="'+post.author.id+'" data-username="'+post.author.username+'" data-role="username">'+post.author.name+'</a>, '+ago+'</cite></li>');
      }
    });
  });  
</script>

<li>
  <h5><a href="'+post.url+'" >'+post.thread.clean_title+'</a></h5>
  <blockquote>'+post.message+'</blockquote>
  <cite> —<a href="'+post.author.profileUrl+'">'+post.author.name+'</a>, '+ago+'</cite>
  '+postscore+'
</li>