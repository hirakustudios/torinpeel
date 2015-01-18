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
	public function lastTrack() {
		$last_track = $this->getJSON('user.getRecentTracks', 1);
		return $last_track['recenttracks'][0];
	}
	public function nowPlaying() {
		$last_track = $this->lastTrack();
		if (isset($last_track['@attr']['nowplaying'])) && @$last_track['@attr']['nowplaying'] !== false) {
			return true;
		} else {
			return false;
		}
	}
	public function recentTrack() {
		$last_track = $this->lastTrack();
		$output = 'I last listened to';
		if ($this->nowPlaying() === false) $output = 'I am currently listening to';
		$output .= ' ' . $last_track['name'] . ' by ' . $last_track['artist']['#text'];
		return $output;
	}
	public function topArtists($amount) {
		$top_artists = $this->getJSON('user.getTopArtists', $amount, '&period=7day');
		$top_artists = $top_artists['topartists'];
		$artist_names = array();
		foreach ($artists as $artist) array_push($artist_names, $artist['name']);
		$last_artist = array_pop($artist_names);
		$artist_names = implode(', ', $artist_names);
		$artist_names .= ' and ' . $last_artist;
		return $artist_names;
	}
	public function getJSON($method, $limit, $otherparams = '') {
		$this->url = 'http://ws.audioscrobbler.com/2.0/?method='.$method.'&user='.$this->user.'&format=json&api_key='.$this->api_key;
		if (isset($limit)) $this->url .= '&limit='.$limit;
		$this->json = file_get_contents($this->url);
		$this->output = json_decode($this->json);
		return $this->output;
	}
}

?>