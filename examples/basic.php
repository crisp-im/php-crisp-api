<?php

require '../vendor/autoload.php';

$CrispClient = new \Crisp\CrispClient();

// Get the keys with https://docs.crisp.chat/guides/rest-api/authentication/

$CrispClient->authenticate(identifier, key);

try {
    $profile = $CrispClient->userProfile->get();
    $firstName = $profile["first_name"];

    echo "Hello $firstName";
} catch (\Crisp\CrispException $exception) {
    var_dump($exception->getError());
    var_dump($exception->getInfo());
}
