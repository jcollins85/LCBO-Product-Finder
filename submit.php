<?php

REQUIRE ('config.php');

//function storeAddress(){

	if(!$_GET['email']){ return "No email address provided"; } 

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {
		return "Email address is invalid"; 
	}
	
	$email = mysql_real_escape_string($_GET['email']); 
	$first_name = $_GET['fname'];
	$last_name = $_GET['lname'];	
	$comment = $_GET['comments'];
	$location = $_GET['location'];
	$red = $_GET['red'];
	$white = $_GET['white'];		
		
	$query = "INSERT INTO request_stlto (email, first_name, last_name, comments, stlto_red, stlto_white, store_info) VALUES ('".$email."','" .$first_name ."','" . $last_name . "', '" . $comment . "', '" . $red . "', '" . $white . "', '" . $location . "')";
	echo $query;
	mysql_query($query, $GLOBALS['dbconnection']);	


	$to = "info@stltowine.com";
	$subject = "A new STLTO Finder request!";
	$message = "Hi STLTO, I have requested your wine at " . $location;
	$from = "info@stltowine.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);

?>
