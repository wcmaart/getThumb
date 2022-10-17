<?php
$myID =  $_GET["objectid"];

//change $jsonurl to match domain
$jsonurl = "https://rs.williams.edu/iiif/" . $myID . "/manifest";
echo $jsonurl;

$json = file_get_contents($jsonurl);
$decoded = json_decode($json,true);


if (strpos($json,"thumbnail")){
	//var_dump($decoded["thumbnail"]["@id"]);
	$urlParm = 'Location: ' . $decoded["thumbnail"]["@id"];
	header($urlParm);
	exit;	
	}
else{
	echo "no thumbnail found for this object. 2";
	}
	
?>
