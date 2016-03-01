<?php

$URI = 'http://localhost:8080/waslab02/wall.php';
$resp = file_get_contents($URI);
echo $http_response_header[0], "\n"; // Print the first HTTP response header


$alltweets = new SimpleXMLElement($resp);

foreach ($alltweets as $tweet) {
	echo '[tweet #', $tweet['id'], '] ', $tweet->author, ': ', $tweet->text, ' [', $tweet->time, ']', "\n";
}

// TASCA #4

$postdata = '<?xml version="1.0"?><tweet><author>Cervantes</author><text>holiiii</text></tweet>';

$opts = array('http' =>
    array(
        'method'  => 'PUT',
        'header'  => 'Content-type: text/xml',
        'content' => $postdata
    )
);

$context = stream_context_create($opts);

$result = file_get_contents('http://localhost:8080/waslab02/wall.php', false, $context);

$client = new SimpleXMLElement($result);
echo 'Aquest sha creat amb el client : [tweet #', $client->tweetid, ']', "\n", "\n";

// TASCA #5


$optsDelete = array('http' =>
    array(
        'method'  => 'DELETE',
    )
);

$contextDelete = stream_context_create($optsDelete);

$resultdelete = file_get_contents('http://localhost:8080/waslab02/wall.php?twid=13', false, $contextDelete);

echo $resultdelete

?>
