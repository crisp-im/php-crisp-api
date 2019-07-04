<?php
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new Crisp();

// Get the keys from https://go.crisp.chat/account/token/
$CrispClient->authenticate(identifier, key);

// Replace with your own website ID
$website_id = "YOUR_WEBSITE_ID";

$nickname = "John Doe";
$email = "john.doe@gmail.com"];
$content_message = "Hello World";

$conversation = $CrispClient->websiteConversations->create($website_id);
$session_id = $conversation["session_id"];

$CrispClient->websiteConversations->updateMeta($website_id, $session_id, ["email" => $email, "nickname" => $nickname]);

$message = ["type" => "text", "from" => "user", "origin" => "email", "content" => $content_message];

$CrispClient->websiteConversations->sendMessage($website_id, $session_id, $message);
?>
