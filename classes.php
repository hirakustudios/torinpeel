<?php
class SpotifyAPI {
	$url = 'http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=itstorin&api_key=4086b09d300efcbda3db72a022559a49&format=json&period=7day&limit=3';
	$json = file_get_contents($this->url);
	$spotify = json_decode($this->json);
	function nowPlaying() {
		echo '<pre>';
		print_r($this->spotify);
		echo '</pre>';
	}
}

?>