<?php

require '../vendor/autoload.php';

$CrispClient = new Crisp\CrispClient();

// Get the keys from https://go.crisp.chat/account/token/
//$CrispClient->authenticate(identifier, key);

// This is the received raw event
$inputJSON = file_get_contents('php://input');
// Let's decode this event as a PHP array
$input = json_decode($inputJSON, true);

// When a visitor leaves a message
if ($input["event"] == "message:send") {
    $websiteId = $input["data"]["website_id"];
    $sessionId = $input["data"]["session_id"];
    $message = [
        "content" => "This is a bot reply",
        "type" => "text",
        "from" => "operator",
        "origin" => "chat"
    ];

    $CrispClient->websiteConversations->sendMessage($websiteId, $sessionId, $message);
}
