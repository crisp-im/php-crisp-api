<?php

require '../vendor/autoload.php';

$CrispClient = new \Crisp\CrispClient();

// Get the keys from https://go.crisp.chat/account/token/
$CrispClient->authenticate(
    "7c3ef21c-1e04-41ce-8c06-5605c346f73e",
    "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a"
);
//$CrispClient->authenticate(identifier, key);

// Replace with your own website ID
$website_id = "YOUR_WEBSITE_ID";

$nickname = "John Doe";
$email = "john.doe@gmail.com"];
$content_message = "Hello World";

$conversation = $CrispClient->websiteConversations->create($website_id);
$session_id = $conversation["session_id"];

$CrispClient->websiteConversations->updateMeta($website_id, $session_id,
    ["email" => $email, "nickname" => $nickname]
);

$message = ["type" => "text", "from" => "user", "origin" => "email", "content" => $content_message];

$CrispClient->websiteConversations->sendMessage($website_id, $session_id, $message);
