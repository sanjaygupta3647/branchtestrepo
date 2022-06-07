<?php
$a = '1';
$b = &$a;
$b = "2$b";
echo $a.", ".$b;

die;
$name =  explode(".","testpng");
echo $name = (count($name)) ? $name[0]:$name; die;




$md5sum = md5_file("https://assets.reapit.net/bar/live/pictures/BEA/21/BEA210151_04.jpg");
echo $md5sum; die;

$url="https://connect.reapit.cloud/oauth2/userInfo";
$client_id = "68j4891jvpeoa381b61vqdrroj";
$client_secret = "163d55pgp8sl7ie1ilgtnu1jsu5rilg7fm7b6vpmvvs8ao9ftf4g";
$tokenUrl = "https://connect.reapit.cloud/token";
 
$tokenContent = "grant_type=client_credentials";
 
$authorization = base64_encode("$client_id:$client_secret");
 
$tokenHeaders = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");
$token = curl_init();
curl_setopt($token, CURLOPT_URL, $tokenUrl);
curl_setopt($token, CURLOPT_HTTPHEADER, $tokenHeaders);
curl_setopt($token, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($token, CURLOPT_RETURNTRANSFER, true);
curl_setopt($token, CURLOPT_POST, true);
curl_setopt($token, CURLOPT_POSTFIELDS, $tokenContent);
$response = curl_exec($token);
curl_close ($token);
 
$token_array = json_decode($response, true);

echo"<pre>"; print_r($token_array);echo"</pre>"; die;

//echo "Bearer ".$token_array["access_token"];  

$headers = array('accept: application/json','api-version: 2020-01-31', 'reapit-customer:SBOX',"Authorization: Bearer ".$token_array["access_token"]);

$apiurl = "https://platform.reapit.cloud/properties/?PageSize=25&pageNumber=211";
$process = curl_init();
curl_setopt($process, CURLOPT_URL, $apiurl);
curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
curl_setopt($process, CURLOPT_CUSTOMREQUEST, "GET");
#curl_setopt($process, CURLOPT_HEADER, 1);
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_HTTPGET, 1);
#curl_setopt($process, CURLOPT_VERBOSE, 1);
curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
$return = curl_exec($process);
curl_close($process);
//echo $return;

echo"<pre>"; print_r($return);echo"</pre>";

 

?>