https://docs.crisp.chat/references/rest-api/v1/#initiate-a-conversation-with-existing-session

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

CrispClient->websiteConversations->initiateOne(websiteId, sessionId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-conversations

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteConversations->findWithSearch(websiteId, page, searchQuery, searchType, searchOperator, includeEmpty, filterUnread, filterResolved, filterNotResolved, filterMention, filterAssigned, filterUnassigned, filterDateStart, filterDateEnd, orderDateCreated, orderDateUpdated);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-an-original-message-in-conversation

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";
$originalId = "2325a3c0-9b47-4fc6-b00e-111b752e44cd";

CrispClient->websiteConversations->getOriginalMessage(websiteId, sessionId, originalId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-conversation-routing-assign

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

CrispClient->websiteConversations->getRouting(websiteId, sessionId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#assign-conversation-routing

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

$params = [
  "assigned" => [
    "user_id" => "a4c32c68-be91-4e29-8a05-976e93abbe3f"
  ]
];

CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#block-incoming-messages-for-conversation

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

$blocked = true;

CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked);

=========================

https://docs.crisp.chat/references/rest-api/v1/#remove-a-conversation

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

CrispClient->websiteConversations->deleteOne(websiteId, sessionId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#mark-messages-as-read-in-conversation

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";
$fingerprint = 524653764345;

$fingerprints = [
  "from" => "operator",
  "origin" => "urn:crisp.im:slack:0",
  "fingerprints" => [
    "5719231201"
  ]
];

CrispClient->websiteConversations->acknowledgeMessages(websiteId, sessionId, fingerprints);

=========================

https://docs.crisp.chat/references/rest-api/v1/#schedule-a-reminder-for-conversation

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

$params = [
  "date" => "2018-05-29T09:00:00Z",
  "note" => "Call this customer."
];

CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-people-profile

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websitePeople->findByEmail(websiteId, email);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websitePeople->findWithSearchText(websiteId, searchText);

=========================

https://docs.crisp.chat/references/rest-api/v1/#add-new-people-profile

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

$params = [
  "email" => "valerian@crisp.chat",
  "person" => [
    "nickname" => "Valerian Saliou"
  ]
];

CrispClient->websitePeople->createNewPeopleProfile(websiteId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-people-conversations

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, page);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-suggested-people-segments

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, page);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-people-events

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, page);

=========================

https://docs.crisp.chat/references/rest-api/v1/#add-a-people-event

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

$event = [
  "text" => "Added item to basket",
  "data" => [
    "price" => 10.99,
    "currency" => "USD"
  ],
  "color" => "red"
];

CrispClient->websitePeople->addPeopleEvent(websiteId, peopleId, event);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-people-data

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

CrispClient->websitePeople->getPeopleData(websiteId, peopleId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#save-people-data

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

$params = [
  "data" => [
    "type" => "customer",
    "signup" => "finished"
  ]
];

CrispClient->websitePeople->savePeopleData(websiteId, peopleId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#update-people-data

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

$params = [
  "data" => [
    "signup" => "finished"
  ]
];

CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-people-subscription-status

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

CrispClient->websitePeople->getPeopleSubscriptionStatus(websiteId, peopleId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#update-people-subscription-status

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

$params = [
  "email" => true
];

CrispClient->websitePeople->updatePeopleSubscriptionStatus(websiteId, peopleId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#create-website

CrispClient->website->create(params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#delete-a-website

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->website->delete(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-website-settings

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteSettings->get(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-verify-settings

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteVerify->getSettings(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#update-verify-settings

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

$params = [
  "enabled" => true
];

CrispClient->websiteVerify->updateSettings(websiteId, params);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-verify-key

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteVerify->getKey(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#roll-verify-key

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteVerify->rollKey(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-website-operators

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteOperators->getList(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-a-website-operator

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$operatorId = "6f3dca08-ee16-4758-8ac7-a7e07075130b";

CrispClient->websiteOperators->getOne(websiteId, operatorId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#unlink-operator-from-website

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$operatorId = "6f3dca08-ee16-4758-8ac7-a7e07075130b";

CrispClient->websiteOperators->deleteOne(websiteId, operatorId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#change-operator-membership

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$operatorId = "6f3dca08-ee16-4758-8ac7-a7e07075130b";

$parameters = [
  "role" => "owner",
  "title" => "CTO"
];

CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-visitors

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->websiteVisitors->listVisitors(websiteId, page);

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-all-active-subscriptions

CrispClient->pluginSubscriptions->listAllActiveSubscriptions();

=========================

https://docs.crisp.chat/references/rest-api/v1/#list-subscriptions-for-a-website

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-subscription-details

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#subscribe-website-to-plugin

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

$pluginId = "98454664-9f7d-4d95-a9ce-f37356f5e65a";

CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#unsubscribe-plugin-from-website

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#get-subscription-settings

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId);

=========================

https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings

$websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
$pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

$settings = [
  "chatbox" => [
    "25" => "#bbbbbb"
  ]
];

CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings);

=========================

