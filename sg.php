<pre>
<?php

$curl = curl_init();
// $res = system("curl ifconfig.me");
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.bigdatacloud.net/data/ip-geolocation?key=bdc_e75789eb032e4bf9a27ea13df177b755%20&ip=136.232.10.146",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Accept: */*",
        "User-Agent: Thunder Client (https://www.thunderclient.com)"
    ],
]);

$response = curl_exec($curl);
echo $response;
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response['location']['latitude'];
}
?>
</pre>