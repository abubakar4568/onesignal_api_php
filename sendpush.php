<?php
	include('classes.php');
	
	//Your OneSingal APP ID
	define("APP_ID", "6380832b-b5bc-4c90-9514-521f57f29c28");
	//Your Onesignal API KEY
	define("API_KEY", "N2U5ZWU0N2UtNWRkNC00OTFlLTg3ZmUtZDk0YTZlMTI5YzA1");
	
	$get_heading = null;
	$get_contents = null;
	$get_url = null;
	$get_largeicon = null;
	$get_bigpicture = null;
	
	$get_heading = $_GET['heading'];
	$get_contents = $_GET['contents'];
	$get_url = $_GET['url'];
	$get_largeicon = $_GET['largeicon'];
	$get_bigpicture = $_GET['bigpicture'];
  
 function sendPushNotification($headings, $contents, $url = null, $large_icon = null, $big_picture = null){
  
  $params = array();
  $params['included_segments'] = array('All');
  if(isset($url)) $params['url'] = $url;
  $params['headings'] = array("en" => $headings);
  $params['contents'] = array("en" => $contents);
  $params['small_icon'] = 'ya';
  if(isset($large_icon)) $params['large_icon'] = $large_icon;
  if(isset($big_picture)) $params['big_picture'] = $big_picture;
  $params['isAndroid'] = true;
  $params['priority'] = 10;
  
  $push = new PushNotification(APP_ID, API_KEY);
  $response = $push->sendNotification($params);
  return $response;
 }
 
 echo sendPushNotification($get_heading, $get_contents, $get_url, $get_largeicon, $get_bigpicture);
