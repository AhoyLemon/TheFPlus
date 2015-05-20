<?php 

//stops uneeded warnings from displaying

error_reporting(E_ALL ^ E_NOTICE);



  try {

    //Parameters  - Feel free to modify these

    $publicKey = "RzacHatO5AX9Lg0qexKqWCIXkbitwPo52meOZiGbYQW9fpETiLIjCWVb3S4Nrc4L";

    $forumName = "thefplus-dev";

    $commentLimit = 15;

    //comma delimited list  of author names."John Doe,Aaron J. White,third" (Not Usernames)

    $filterUsers = ""; 

    // zero default = 3x comment limit

    $filterLimit=0; 

    $useRelativeTime =false;

    $dateFormat='F j, Y \a\t g:iA';

    $commentLength=95;

    $apiVersion = "3.0";

    $resource = "posts/list";

    $outputType = "json";

    

    // put style parameters in an array

    $styleParameter = array(

      "commentLimit" => $commentLimit,

      "useRelativeTime" =>$useRelativeTime,

      "dateFormat" => $dateFormat,

      "commentLength" => $commentLength,

      "filterUsers" =>$filterUsers

      );

    //put request parameters in an array

    $dqParameter = array( 

      "api_key" => $publicKey,

      "forum" => $forumName,

      "include" => "approved",

      "limit" =>  $commentLimit

      );

    //change limit used if users are being filter out.

    if(strlen(trim($filterUsers)))

    {

      if($filterLimit != 0)

      {

        $dqParameter["limit"] = $filterLimit;

      }

      else

      {

        $dqParameter["limit"] = 3*$commentLimit;

      }

      

    }

    //Create base request string

    $dqRequest ="http://disqus.com/api/".$apiVersion."/".$resource.".".$outputType;

    //add parameters to request string

    $dqRequest = addQueryStr($dqRequest, $dqParameter);

    // get response with finished request url

    $dqResponse = file_get_contents_curl($dqRequest);

    //check repsonse

    if($dqResponse != false )

    {

      // convert response to php object 

      $dqResponse = @json_decode($dqResponse, true);

      // get comment items from response

      $dqComment = $dqResponse["response"];

      //check comment count

      if(count($dqComment) > 0)

      {

        echoComments(

                $dqComment, 

                $publicKey,

                $styleParameter

              );

      }

      else

      {

        noComments();

      }

    }

    else

    {

      noComments(); 

    }



  }

  catch(Exception $e)

  {

    noComments();

    //echo($e);

  }



  function echoComments($comment, $publicKey, $styleParameter)

  {

    //basic counter

    $commentCounter = 0;

    //filtered user array

    $filteredUsers = explode(",",$styleParameter["filterUsers"]);

    //create html string

    $recentComments = '<div id="dqRecentComments">';

    foreach($comment as $commentObj)

    {

      

      // first skip to next if user is filtered

      $authorName = $commentObj["author"]["name"];

      if($filteredUsers != null)

      {

        if(in_array($authorName,$filteredUsers))

        { 

          //we don't like this user. skip to next

          continue;

        }

      }

      //everything is fine, let's keep going

      $commentCounter++;

      //alternate class

      if($commentCounter % 2 !== 0)

      {

        $wrapClass ="dqCommentWrap";

      }

      else

      {

        $wrapClass ="dqCommentWrap alter";

      }

      //get rest of comment data

      $authorProfile = $commentObj["author"]["profileUrl"];

      $authorAvatar = $commentObj["author"]["avatar"]["large"]["cache"];

      $message = $commentObj["raw_message"];

      $commentId = '#comment-'.$commentObj["id"];

      if($styleParameter["useRelativeTime"] == true)

      {

        $postTime = relative_time(strtotime($commentObj["createdAt"].'+0000'));

      }

      else

      {   

        $postTime = date(

                  $styleParameter["dateFormat"] ,

                  strtotime($commentObj["createdAt"].'+0000') 

                );

      }

      $threadInfo = getThreadInfo(

                      $commentObj["thread"], 

                      $publicKey

                    );

      $threadTitle = $threadInfo["title"];

      $threadLink = $threadInfo["link"];

      

      // shorten comment

      $message = shortenComment(

                    $message, 

                    $styleParameter["commentLength"] 

                  );

      //create comment html

      $commentHtml = '<div class="'.$wrapClass.'">

                <div class="dqCommentHead">

                  <div class="dqAvatarWrap">

                    <img class="dqCommentAvatar" src="'.$authorAvatar.'" alt="'.$authorName.'"/>

                  </div>

                  <div class="dqCommentMeta">

                    <span class="dqCommentAuthor">

                      <a class="dqProfileLink" href="'.$authorProfile.'">'.$authorName.'</a>

                    </span>

                    <span class="dqCommentTime">'.$postTime.'</span>

                  </div>

                  <div class="dqClear"></div>

                </div>

                <div class="dqCommentBody">

                  <a class="dqCommentThread" href="'.$threadLink.'">'.$threadTitle.'</a>

                  <div class="dqCommentText"><a class="dqCommentLink" href="'.$threadLink.$commentId.'">'.$message.'</a></div>

                </div>

              </div>';

      $recentComments .= $commentHtml;

      //stop loop when we reach limit

      if($commentCounter == $styleParameter["commentLimit"])

      {

        break;

      }

    }

    $recentComments .= '</div>';

    echo($recentComments);

  }



  function noComments()

  {

    echo(

        '<div id="dqRecentComments">

        <span id="dqNoComments">No Recent Comments Found</span>

        </div>'

      );

  }

  function shortenComment($comment, $commentLength)

  {

    if($commentLength != 0)

    {

      if(strlen($comment) > $commentLength)

       {

        

        $comment = preg_replace(

                      '/\s+?(\S+)?$/', '', 

                      substr($comment, 0, $commentLength+1)

                    )."...";

        

       }

    }

    return $comment;

  }



  function getThreadInfo(

                $threadId, 

                $publicKey, 

                $apiVersion = "3.0", 

                $resource = "threads/details", 

                $outputType = "json"

              )

  {

    $dqRequest ="http://disqus.com/api/".$apiVersion."/".$resource.".".$outputType;

    $dqParameter = array( 

                "api_key" => $publicKey,

                "thread" => $threadId

              );

    $dqRequest = addQueryStr($dqRequest, $dqParameter);



    // convert response to php object 

    $dqResponse= file_get_contents_curl($dqRequest);

    if($dqResponse !== false)

    {

      $dqResponse = @json_decode($dqResponse, true);

      $dqThread = $dqResponse["response"];

      return $dqThread;

    }

    else

    {

      $dqThread = array(

                title=> "Article not found",

                link => "#"

              );

      return $dqThread;

    }

  }

  function addQueryStr($baseUrl,$parameters)

  {

    $i=0;

    if (count($parameters) > 0)

    {

    $newUrl = $baseUrl;

      foreach($parameters as $key => $value)

      { 

         if($i == 0)

         {

          $newUrl .="?".$key."=".$value;

        }

        else

        {

          $newUrl .="&".$key."=".$value;

        }

        $i +=1;

      }

      

      return $newUrl;

    }

    else

    {

      return $baseUrl;

    }

  }

   function file_get_contents_curl($url) 

   {

    //Source: http://www.codeproject.com/Questions/171271/file_get_contents-url-failed-to-open-stream

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HEADER, 0);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.

      curl_setopt($ch, CURLOPT_URL, $url);

      curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);  // don't use cached ver. of url 

      curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1); // seriously...don't use cached ver. of url

      $data = curl_exec($ch);

      curl_close($ch);

      return $data;

    }

  function relative_time($date)

  {

    //Source: http://stackoverflow.com/questions/2690504/php-producing-relative-date-time-from-timestamps

      $now = time();

      $diff = $now - $date;



      if ($diff < 60){

          return sprintf($diff > 1 ? '%s seconds ago' : 'a second ago', $diff);

      }



      $diff = floor($diff/60);



      if ($diff < 60){

          return sprintf($diff > 1 ? '%s minutes ago' : 'one minute ago', $diff);

      }



      $diff = floor($diff/60);



      if ($diff < 24){

          return sprintf($diff > 1 ? '%s hours ago' : 'an hour ago', $diff);

      }



      $diff = floor($diff/24);



      if ($diff < 7){

          return sprintf($diff > 1 ? '%s days ago' : 'yesterday', $diff);

      }



      if ($diff < 30)

      {

          $diff = floor($diff / 7);



          return sprintf($diff > 1 ? '%s weeks ago' : 'one week ago', $diff);

      }



      $diff = floor($diff/30);



      if ($diff < 12){

          return sprintf($diff > 1 ? '%s months ago' : 'last month', $diff);

      }



      $diff = date('Y', $now) - date('Y', $date);



      return sprintf($diff > 1 ? '%s years ago' : 'last year', $diff);

  }

?>