<?php
  include './EpiCurl.php';
  $mc = EpiCurl::getInstance();

$responses = $curlHandles = array();
for ($i = 0; $i<1000; $i++) {
 $curlHandles[$i] = curl_init("http://localhost/main/receipt");
 curl_setopt($curlHandles[$i], CURLOPT_PORT, 4080);
 curl_setopt($curlHandles[$i], CURLOPT_HEADER, 0);
 curl_setopt($curlHandles[$i], CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curlHandles[$i], CURLOPT_POST, 1);
 $encoded = json_encode(array('count' => $i, 'bob' => 2));
 curl_setopt($curlHandles[$i], CURLOPT_POSTFIELDS, $encoded);
 $output = curl_exec($curlHandles[$i]);
 $responses[] = $mc->addCurl($curlHandles[$i]);
}

foreach($responses as $count => $response)
 echo "Call {$count} had code {$response->code}\n<br>"; // this is needed to ensure the call completes

foreach($curlHandles as $handle)
 curl_close($handle);

?>
