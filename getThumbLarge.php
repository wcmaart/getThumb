<?php
//This is a good sized image even though it says thumbnail
$myID =  $_GET["objectid"];
echo $myID;

//change $jsonurl to match domain
$jsonurl = "https://rs.williams.edu/iiif/" . $myID . "/manifest";
$json = file_get_contents($jsonurl);
$decoded = json_decode($json,true);

if (strpos($json,"thumbnail")){
	$urlParm = 'Location: ' . $decoded["thumbnail"]["@id"];

	header($urlParm);
	exit;	
	}
else{
	echo "no thumbnail found for this object. 2";
	}
	
?>
