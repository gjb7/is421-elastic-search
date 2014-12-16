<?php
require 'vendor/autoload.php';

use TwitterOAuth\Auth\ApplicationOnlyAuth;
use TwitterOAuth\Serializer\ArraySerializer;

use \ElasticSearch\Client;

$es = Client::connection();

$credentials = array(
	'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
	'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET'),
);

$auth = new ApplicationOnlyAuth($credentials, new ArraySerializer());

$last_tweet_id = null;

if (file_exists('last_id.json')) {
	$last_id_data = file_get_contents('last_id.json');
	$last_id = json_decode($last_id_data);
	$last_tweet_id = $last_id->id;
}

$params = array(
	'count' => 100,
	'geocode' => '37.7833,122.4167,100mi',
	'result_type' => 'recent'
);

if ($last_tweet_id) {
	$params['since_id'] = $last_tweet_id;
}

$response = $auth->get('search/tweets', $params);

foreach ($response['statuses'] as $status) {
	$id = $status['id'];
	
	if ($id > $last_tweet_id) {
		$last_tweet_id = $id;
	}
	
	$es->index($status, $id);
}

file_put_contents('last_id.json', json_encode(array('id' => $last_tweet_id)));

?>