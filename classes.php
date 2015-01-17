<?php
class SpotifyAPI {
	public $url;
	public $json;
	public $spotify;
	public function __construct() {
		$this->url = 'http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=itstorin&api_key=4086b09d300efcbda3db72a022559a49&format=json&period=7day&limit=3';
		$this->json = file_get_contents($this->url); 
		$this->spotify = json_decode($this->json);
	}
	public function nowPlaying() {
		echo '<pre>';
		print_r($this->spotify);
		echo '</pre>';
	}
}

?>