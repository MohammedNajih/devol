<?php
$username = 'bjksnsns';
$password = '';

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
