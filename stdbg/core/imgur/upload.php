<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once 'uploaded_image.php';

$image = file_get_contents("123.jpg");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . IMGUR_OAUTH_CLIENT_ID));
curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image)));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

$reply = curl_exec($ch);
curl_close($ch);

$reply = json_decode($reply);

$ui = new UploadedImage($reply);

var_dump( $reply );

var_dump( $ui );

printf('<img height="180" src="%s" >', $reply->data->link);