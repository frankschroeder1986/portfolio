<?php

$email = $_POST["email"];
$name = $_POST["name"];
$nachricht = $_POST["nachricht"];

$empfaenger = 'frankschroeder1986@gmail.com'; // Ihre eigene E-Mail-Adresse hier einfügen
$header = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query(array(
            'empfaenger' => $empfaenger,
            'betreff' => $betreff,
            'nachricht' => $nachricht,
            'header' => $header
        ))
    ),
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false
    )
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
?>
