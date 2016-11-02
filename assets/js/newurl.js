/* jshint -W117 */
var path = document.URL;
var newurl;
if (path.indexOf('com_content') > -1) {
  var pathArray = path.split('&');
  var n= pathArray[2].split('=');
  var rid = n[1];
  if (rid == 29) {
    var reader = path.split('#');
    var r = reader[1];
    simpleArray = ['lemon','bumpgrrl','bunnybread','isfahan','jimmyfranks','kumquatxop','portaxx','stog'];
    if (!$.inArray(r, simpleArray)) {
      newurl = "meet/"+r;
    } else if (r == "boots") {
      newurl = "meet/boots-raingear";
    } else if (r == "acier") {
      newurl = "meet/acierocolotl";
    } else if (r == "bozarth") {
      newurl = "meet/adam-bozarth";
    } else if (r == "jackchick") {
      newurl = "meet/jack-chick";
    } else if (r == "john") {
      newurl = "meet/john-toast";
    } else if (r == "nutshell" || r == "gulag") {
      newurl = "meet/nutshell-gulag";
    } else if (r == "victor") {
      newurl = "meet/victor-laszlo";
    } else if (r == "frank" || r == "frankwest") {
      newurl = "meet/frank-west";
    } else if (r == "lou") {
      newurl = "meet/lou-fernandez";
    } else {
      newurl = "meet";
    }
    window.location.replace("http://thefpl.us/"+newurl);
  } else {
    if (rid.indexOf(':') > -1) {
      t = rid.split(':');
      rid = t[0];
    }
    $.getJSON('assets/js/old-episode-ids.js', function(response){
      newurl = "episode/"+response[rid];
      window.location.replace("http://thefpl.us/"+newurl);
    });
  }
}