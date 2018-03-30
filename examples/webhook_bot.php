<?php

require '../vendor/autoload.php';

$CrispClient = new Crisp();

// Authenticate to API (identifier, key)
$CrispClient->authenticate("7c3ef21c-1e04-41ce-8c06-5605c346f73e", "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a");
//$CrispClient->authenticate(identifier, key);

// This is the received raw event
$inputJSON = file_get_contents('php://input');
// Let's decode this event as a PHP array
$input = json_decode($inputJSON, TRUE);

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

?>
