<?php

require '../vendor/autoload.php';

$CrispClient = new \Crisp\CrispClient();

// Get the keys with https://docs.crisp.chat/guides/rest-api/authentication/
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
