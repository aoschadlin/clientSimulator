<?php
  include './EpiCurl.php';
  $mc = EpiCurl::getInstance();

  // call server
  $ch = curl_init("http://localhost/main/receipt");
  curl_setopt($ch, CURLOPT_PORT, 4080);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  for ($i = 0; $i<10; $i++) {
    $encoded = json_encode(array('count' => $i, 'bob' => 2));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
    $mc->addCurl($ch);
  }
?>
