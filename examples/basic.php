<?php

require '../vendor/autoload.php';
$CrispClient = new Crisp();

// Authenticate to API (identifier, key)
// eg. $CrispClient->authenticate("7c3ef21c-1e04-41ce-8c06-5605c346f73e", "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a");
$CrispClient->authenticate(identifier, key);

$profile = $CrispClient->userProfile->get();
$firstName = $profile["first_name"];

echo "Hello $firstName";
?>
