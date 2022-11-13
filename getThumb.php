<?php
$myID =  $_GET["objectid"];
echo $myID;

//change $jsonurl to match domain
$jsonurl = "https://rs.williams.edu/iiif/" . $myID . "/manifest";
$json = file_get_contents($jsonurl);
$decoded = json_decode($json,true);

// str_replace changes the iiif thumbnail image to a smaller one using the iiif resizing feature
if (strpos($json,"thumbnail")){
	$urlParm = 'Location: ' . str_replace("thm","150,",$decoded["thumbnail"]["@id"]);

	header($urlParm);
	exit;	
	}
else{
	echo "no thumbnail found for this object. 2";
	}
	
?>

