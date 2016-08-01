<?php

require '../vendor/autoload.php';
$CrispClient = new Crisp();

$CrispClient->userSession->loginWithEmail("yourEmail@gmail.com", "password");

$profile = $CrispClient->userProfile->get();
$firstName = $profile["first_name"];

echo "Hello $firstName";
?>
