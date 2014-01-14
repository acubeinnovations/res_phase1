<?php

//set POST variables
$url = $_POST['url'];
unset($_POST['url']);

$fields_string = "";
//url-ify the data for the POST
foreach($_POST as $key=>$value) { 
	$fields_string .= $key.'='.$value.'&'; 
}
$fields_string = rtrim($fields_string,'&');

//open connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url); // URL to post
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_PORT, 8080);
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

?>
