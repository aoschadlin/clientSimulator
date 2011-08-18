<?php
  $ch = curl_init("http://localhost/main/receipt");
  curl_setopt($ch, CURLOPT_PORT, 4080);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);

  for ($i = 0; $i<10000; $i++) {
    $encoded = json_encode(array('count' => $i, 'bob' => 2));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
    $output = curl_exec($ch);
  }
  curl_close($ch);

?>
