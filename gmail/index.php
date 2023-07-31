<?php
$email = $_GET['email'];
$url = 'https://android.clients.google.com/setup/checkavail';
$data = json_encode(array('username'=>$email,'version'=> '3','firstName'=> 'AbaLahb','lastName'=> 'AbuJahl'));
$headers = array(
                'Content-Type: text/plain; charset=UTF-8',
                'Host: android.clients.google.com',
                'Connection: Keep-Alive',
                'user-agent: GoogleLoginService/1.3(m0 JSS15J)'
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);
//echo $response;
if (strpos($response, '{"status":"SUCCESS"}') !== false) {
	echo json_encode(array("status"=>"SUCCESS"));
}else{
	echo json_encode(array("status"=>"Error Not Found"));
} 
 