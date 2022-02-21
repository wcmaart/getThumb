<?php
$obID = $_GET["id"];


//echo $obID;
$curl = curl_init();
curl_setopt_array($curl,[
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://egallery/objects/' . $obID . '/json?key=f2878c3ce0518327ec2c5d9323957974f11742a29dd8ca24250ef73a743c5a88',
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
    
    $urlParm = 'Location: ' . $fullURL . '/thumbnail'; //bigger than postagestamp size
    header($urlParm);
    exit;
 }
else{
    echo "no primary media found";
}
    curl_close();
?>
