<?php
class LastFMAPI {
	public $url;
	public $json;
	public $api_key;
	public $user;
	public function __construct($api_key, $user) {
		$this->api_key = $api_key;
		$this->user = $user;
	}
	public function nowPlaying() {
		echo '<pre>';
		print_r($this->spotify);
		echo '</pre>';
	}
	public function topArtists($amount) {
		$this->top_artists = getJSON('user.getTopArtists', $amount);
		echo '<pre>';
		print_r($this->top_artists);
		echo '</pre>';
	}
	public function getJSON($method, $limit) {
		$this->url = 'http://ws.audioscrobbler.com/2.0/?method='.$this->method.'&user='.$this->user.'&api_key='.$this->api_key;
		if (isset($limit)) $this->url .= '&limit='.$limit;
		$this->json = file_get_contents($this->url);
		$this->output = json_decode($this->json);
		return $this->output;
	}
}

?>