
<script>

  $(document).ready(function() {
    $commentDiv = $("#comments");

    $.get("https://disqus.com/api/3.0/forums/listPosts.json?forum=thefplus&limit=10&related=thread&api_key=RzacHatO5AX9Lg0qexKqWCIXkbitwPo52meOZiGbYQW9fpETiLIjCWVb3S4Nrc4L", function(res, code) {
      //Good response?
      if(res.code === 0) {
        var result = "";
        for(var i=0, len=res.response.length; i<len; i++) {
          var post = res.response[i];
          console.dir(post);
          var longText = post.raw_message.replace(/(<([^>]+)>)/ig,"");
          
          if (longText.length > 99 ) {  
            // trims it to 17 charcters  
            shortText = longText.substr(0,97)+"...";
          } else {
            shortText = longText;
          }
          console.log(shortText);
          var html = "<a class='recent-comment' href='"+ post.thread.link + "#disqus_thread'>";
          //html += "<img src='" + post.author.avatar.small.permalink + "' class='avatar'>";
          html += "<blockquote>"+shortText+"</blockquote>";
          html += "<cite>" + post.author.name + ", "+post.thread.title+"</cite>";
          html += "</a>";
          result+=html;
        }
        $commentDiv.html(result);
        
      }
    });
  });  
</script>