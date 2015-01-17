<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="I am a web developer, graphic designer, digital campaign  strategist and political aficionado from Geelong, Australia.">
<title>Torin Peel</title>

<!-- Latest Bootstrap CSS and FontAwesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<style>
html,body {margin-top:10px;}
</style>

</head>

<body>

<div class="container" style="padding-bottom:15px;">

<div  class="alert alert-info" role="alert">This website updates in  realtime from services including Twitter, Foursquare, Last FM and  more.</div>

<div class="jumbotron">
  <h1>Hello, I am Torin</h1>
   <p>I am a web developer, graphic designer, digital campaign  strategist and political aficionado from Geelong, Australia. You can  often find me tweeting on Twitter.</p>
  <p><a class="btn btn-primary btn-lg" href="mailto:me@torinpeel.com" role="button">Contact me</a> <a class="btn btn-success btn-lg" href="mailto:business@torinpeel.com" role="button">Hire me</a></p>
</div>

<div class="row">
<div class="col-md-8">

<h3>Personal</h3>
I was born on the 2nd of June, 1999. That makes me 15, with another 

<?php
$future = strtotime('2 June 2015');
$now = time();
$timeleft = $future-$now;
$daysleft = round((($timeleft/24)/60)/60);
echo $daysleft;
?>

 days until my 16th birthday. I am a <a href="http://geelongcats.com.au/" target="_blank">Geelong Cats</a> supporter, and a member of the <a href="http://alp.org.au/" target="_blank">Australian Labor Party</a>. I am currently learning French and Spanish.

<h3>Music</h3>
I  most recently listened to <span  id="lfmMostRecentTrackTitle"></span> by <span  id="lfmMostRecentTrackArtist"></span> on <i class="fa  fa-spotify"></i> <a href="https://play.spotify.com/user/1233743042" target="_blank">Spotify</a>. Some of my favourite artists at the moment are

<?php
$url = 'http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=itstorin&api_key=4086b09d300efcbda3db72a022559a49&format=json&period=7day&limit=3';
$json = file_get_contents($url);
$json = json_decode($json, true);
$artists = $json['topartists']['artist'];
$artist_names = array();
foreach ($artists as $artist) {
        array_push($artist_names, $artist['name']);
}
$last_artist = array_pop($artist_names);
$artist_names = implode(', ', $artist_names);
$artist_names .= ' and ' . $last_artist;
echo $artist_names;
?>.

<h3>Social Media</h3>
I last tweeted 

<?php
require('twitter.php');
$settings = array(
        'oauth_access_token' => "294379576-CR3vs3sT4KZDsYvhh1peTwh7aLOLgUl2IHfO6k0", 
        'oauth_access_token_secret' => "IpoUzBM4EhNgV3ihWevzr7dw2LvSD8AsYR2D4SdlgSQ", 
        'consumer_key' => "UQ6dxWAOxpnp2kXOELub9Q", 
        'consumer_secret' => "tkehqilvacNmJwopI7gs7mri2WMVrqm95syKJOmuw1A" 
);
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=torin&limit=1';
$requestMethod = 'GET';
function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
   
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
   
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }   
    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }       
    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }       
    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }   
    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }   
    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }   
    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }   
    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}
$twitter = new TwitterAPIExchange($settings);
$results = $twitter->setGetfield($getfield)
                                 ->buildOauth($url, $requestMethod)
                                 ->performRequest();
$results = json_decode($results, true);
$tweet = $results[0];
$followers = $tweet['user']['followers_count'];
$created_at = $tweet['created_at'];
echo time_passed(strtotime($created_at));
?>

 on <i class="fa fa-twitter"></i> <a href="http://twitter.com/torin" target="_blank">Twitter</a>, where I have <?php echo $followers; ?> followers.

<h3>Location</h3>
I was last seen at 

<?php
$url2 = 'https://api.foursquare.com/v2/users/self/checkins?oauth_token=RTVKLSVUHFF5SAD5LKG4UHACEPTA4O3MW2OSF033S1JL5EYV&v=20150117';
$json2 = file_get_contents($url2);
$json2 = json_decode($json2, true);
$place = $json2['response']['checkins']['items'][0]['venue']['name'];
$last_places = $json2['response']['checkins']['items'];
$last_places_three = array();
$i = 0;
while (sizeof($last_places_three) < 3) {
     if  (in_array($last_places[$i]['venue']['location']['city'], $last_places_three) === false) {
         array_push($last_places_three,  $last_places[$i]['venue']['location']['city']);
    }
    $i++;
}
$third_last_place = array_pop($last_places_three);
$last_places_three = implode(', ', $last_places_three);
$last_places_three .= ' and ' . $third_last_place;
echo $place;
?>

 on <i class="fa fa-foursquare"></i> <a href="http://swarmapp.com/" target="_blank">Foursquare</a>. I have most recently traveled to <?php echo $last_places_three; ?>.
 
<h3>Technology</h3>
At home, my primary computer is a custom-built system running Windows 8. I also carry around a <a href="https://www.apple.com/au/macbook-air/" target="_blank">Macbook Air</a>. Right now, my phone is a <a href="http://google.com.au/nexus/5/" target="_blank">Google Nexus 5</a> running Android Lollipop.
 
</div>

<div class="col-md-4">
<h3>Latest Tweets</h3>

<a class="twitter-timeline" href="https://twitter.com/torin" data-widget-id="245490041999212544">Tweets by @torin</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>

</div>

<div>

<!-- Displaying the data from the Last FM API call -->
<script type="text/javascript"> 
 
function lfmMostRecentTrack(JSONdata) {
 try {
 var oTrack = (new Array().concat(JSONdata.recenttracks.track))[0];
 document.getElementById("lfmMostRecentTrackArtist").innerHTML = oTrack.artist["#text"];
 document.getElementById("lfmMostRecentTrackTitle").innerHTML = oTrack.name;
 } catch(e) {}
}
</script>

<!-- Calling on the Last FM API -->
<script type="text/javascript" src="http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=itstorin&api_key=4086b09d300efcbda3db72a022559a49&limit=1&format=json&callback=lfmMostRecentTrack"></script>

<!-- Latest compiled and minified JavaScript and jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
</body>

</html>       