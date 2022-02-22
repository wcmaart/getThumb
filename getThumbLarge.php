<?php
$obID = $_GET["objectid"];
$WCMAKey = getenv('WCMA_API_KEY');

//echo $obID;



$curl = curl_init();
curl_setopt_array($curl,[
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://egallery.williams.edu/objects/' . $obID . '/json?key=' . $WCMAKey,
    CURLOPT_USERAGENT => 'egallery API in CURL'
]);

$response = curl_exec($curl);

//echo ($response);
$startURL = strpos($response,'http://egallery');
//echo $startURL;
$endURL = strpos($response,'/full',$startURL);
//echo $endURL;
$fullURL = substr($response,$startURL,$endURL - $startURL);
//echo $fullURL;


if (strpos($response,"primaryMedia")){
    
    $urlParm = 'Location: ' . $fullURL; 
    header($urlParm);
    curl_close();
    exit;
 }
else{
    echo "no primary media found";
    curl_close();
}
 
    
?>
