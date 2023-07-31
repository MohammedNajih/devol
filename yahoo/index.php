<?php
$user = $_GET['email'] ;
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

$user = explode("@", $user)[0];

$url = 'https://login.yahoo.com/account/module/create/suggestions?crumb='.$crumb.'&acrumb='.$acrumb.'&firstName=Mohammedbsjkssk&lastName=Almuswi&yid='.$user.'&sessionIndex=QQ--';

$headers = array(
'Host: login.yahoo.com', 
'sec-ch-ua: "Chromium";v="107", "Not=A?Brand";v="24"', 
'x-requested-with: XMLHttpRequest', 
'sec-ch-ua-mobile: ?1', 
'user-agent: Mozilla/5.0 (Linux; Android 10; YAL-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Mobile Safari/537.36', 
'sec-ch-ua-platform: "Android"',
'accept: */*',
'sec-fetch-site: same-origin', 
'sec-fetch-mode: cors', 
'sec-fetch-dest: empty', 
'referer: https://login.yahoo.com/account/module/create?intl=xa&specId=yidregsimplified&done=https%3A%2F%2Fwww.yahoo.com&context=reg', 
'accept-encoding: gzip, deflate, br', 
'accept-language: en-IQ,en;q=0.9,ar-IQ;q=0.8,ar;q=0.7,en-GB;q=0.6,en-US;q=0.5', 
'cookie: A3=d=AQABBG_t0mMCEEzX3VZeEwYH6N0VOn3C-uAFEgEBAQE-1GPcYwAAAAAA_eMAAA&S=AQAAAtASAvwJfA9FA-WIx0uSRpA;A1=d=AQABBG_t0mMCEEzX3VZeEwYH6N0VOn3C-uAFEgEBAQE-1GPcYwAAAAAA_eMAAA&S=AQAAAtASAvwJfA9FA-WIx0uSRpA;A1S=d=AQABBG_t0mMCEEzX3VZeEwYH6N0VOn3C-uAFEgEBAQE-1GPcYwAAAAAA_eMAAA&S=AQAAAtASAvwJfA9FA-WIx0uSRpA&j=WORLD;AS=v=1&s='.$acrumb.'&d=A64209ea6|FLNP3pb.2Tpra9iTy.L0WhkwCsyIjhw8Kb43l8DTHxW3xfGvugRLqgttoYNmQnUhKoPjB6k4jbkny0GGdZ0WfOJ4AoCI.11CFpXj1HMgZMypRNwDpCaw0TJXim1wNULJMu8QrKzwUtvxWeru3UUbpG0ZOLWXLLVsUltZck9Z5nQEXqqO9KoXoyo7OdxjIR5BQ4yYFfgjcr4VzQjTl9N1HBEq98chh4AZXtkFfj3VhrHI1u8QnrwnbrQh7RTw8YWzn9pCOf6JI0Wkj6JFrGd8D8qZGk2_pLy2P6vIrj8M53Fl0AeWaD95WqpVAtUuEvz0w1i22p1UtYpS273qv3EkheQhKIVrqGmwDyxN3PtaJKnFrqW6ANzVAA_Cc9M045XZBMhZaGc0tk2plLB.sjFFM4Tl1dj45L01IGGjERbPR.En5WhyMoJ0KL2uzrp11rNrlNpkAwF.LA_c48QqeJLMolt7DROypzQ6wUk5kic8nV1rbG7K9SAr23P7KTh3QB_cfnnUv3h6RcY5RszCQjlEfY3.hVnU8CDEYMtKs6jg.CR0ewjVzrQwdBoxrCwcbfZpgbg_AOHPWs0fnP2N7Nc5DF85pAX9tcv7_DTerSA.gAVEnciqUQLru6Na7HMoLFyM1AxmxiS6XrL9X5wHpFpaj1.E9U95RSZ6kGFP596r_ukVnvdB7ufs4R2LzNyoWz2mPDMAvMWLytSEBAemf._gVCfVGrOGF.qKwruJh2myUQdnlzwppO.hutGMhtC3rIaFpg6ZbDlF5ir_0CCN4hN95p5FvDkjQJcxtBggMIbxevEIWynWiX6iItp.n4azuq3WSYeMZIDIrIOTTK5ZO3RmxvV3Xq4rftcwFnrXZTIu6hlGk4GAeSfDRsBA6LY3n3NJDsuGsbSBKHZZx2d607q1RhkDzbG0_QRul7Tl3IC6ACm1ojdhnxxiEY8BhISllK67jpXlhViA2Jt.OsPwKeLhrY_qQvIBP3KCqA--~A'
);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);
//echo $response;
if (strpos($response, '"'.$user.'"') !== false) {
     echo json_encode(array("success"=>"SUCCESS EMAIL"));
}else{
     echo json_encode(array("success"=>"False"));
} 
?>



