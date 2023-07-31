<?php
$email = $_GET["email"];

$url =  "https://account.mail.ru/api/v1/user/exists";

$data = http_build_query(array(
	'email' => $email
));

$headers = array(
		"User-Agent: Mozilla"
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
//$response = json_decode(json_encode($response));
curl_close($ch);
//echo $response;
if (strpos($response, '"body":{"exists":false') !== false) {
	echo json_encode(array("status"=>"SUCCESS"));
}else{
	echo json_encode(array("status"=>"Error Not Found"));
} 