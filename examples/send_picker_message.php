<?php

require '../vendor/autoload.php';

$CrispClient = new \Crisp\CrispClient();

// Get the keys from https://go.crisp.chat/account/token/
$CrispClient->authenticate(
    "7c3ef21c-1e04-41ce-8c06-5605c346f73e",
    "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a"
);
//$CrispClient->authenticate(identifier, key);

$websiteId = "WEBSITE_ID";
$sessionId = "SESSION_ID";

$message = [
    "content" => [
      "id" => "routing",
      "text" => "What is your question about?",
      "choices" => [[
        "value" => "sales",
        "label"=> "Sales",
        "selected" => false
      ], [
        "value" => "tech",
        "label" => "Tech",
        "selected" => false
      ]]
    ],
    "type" => "picker",
    "from" => "operator",
    "origin" => "chat"
];

$CrispClient->websiteConversations->sendMessage($websiteId, $sessionId, $message);
