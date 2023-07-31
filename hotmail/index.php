<?php
$email = $_GET['email'];
$url = 'https://odc.officeapps.live.com/odc/emailhrd/getidp?hm=0&emailAddress='.$email.'&_=1604288577990';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
//echo $response;
if (strpos($response, 'Neither') !== false) {
	echo json_encode(array("status"=>"SUCCESS"));
}else{
	echo json_encode(array("status"=>"Error Not Found"));
} 
 