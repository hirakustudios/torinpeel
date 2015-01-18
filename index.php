<?php require('classes.php'); ?>
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
                            
<body>

<div class="intro"></div>
<div class="personal"></div>
<div class="music">
<?php
	$lastfm = new LastFMAPI('4086b09d300efcbda3db72a022559a49', 'itstorin');
	echo $lastfm->topArtists(3);
	echo $lastfm->recentTrack();
?>
</div>
<div class="location"></div>
<div class="technology"></div>
<div class="social"></div>

<!-- Calling on the Last FM API -->
<script type="text/javascript" src="http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=itstorin&api_key=4086b09d300efcbda3db72a022559a49&limit=1&format=json&callback=lfmMostRecentTrack"></script>

<!-- Latest compiled and minified JavaScript and jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
</body>

</html>   