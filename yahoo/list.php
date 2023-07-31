<?php

$username = 'bjksnsns';
$password = '';

// Login to Yahoo and get the crumb and acrumb
$url = 'https://login.yahoo.com';


$options = array(
    'https' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'GET',
    )
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//Echo htmlspecialchars($result);
$matches = array();
preg_match('/name="crumb" value="(.*?)"/', $result, $matches);
$crumb = $matches[1];

$ccc = explode('type="hidden" name="acrumb" value="',$result)[1];
$acrumb = explode('"',$ccc)[0];

echo 'Crumb: ' . $crumb . '<br>';
echo 'Acrumb: ' . $acrumb . '<br>';
$header = json_encode(get_headers($url));
//Echo $header;
$cookies = explode("Set-Cookie: ", $header)[1];

$cookies = explode("Content-Type", $cookies)[0];

Echo "Cookies: ".$cookies."<br>";
