<?php
$myID =  $_GET["objectid"];
//echo $myID;

//change $jsonurl to match domain
$jsonurl = "http://egallery.williams.edu/apis/iiif/presentation/v2/1-objects-" . $myID . "/manifest";

//$jsonurl = "http://egallery.williams.edu/apis/iiif/presentation/v2/objects-351/manifest";

$json = file_get_contents($jsonurl);
$decoded = json_decode($json,true);

if (strpos($json,"thumbnail")){
	//var_dump($decoded["thumbnail"]["@id"]);
	$urlParm = 'Location: ' . $decoded["sequences"][0]["canvases"][0]["images"][0]["resource"]["@id"];
	header($urlParm);
	exit;	
	}
else{
	echo "no thumbnail found for this object";
	}
?>

