# Crisp API PHP

The Crisp API PHP wrapper. Authenticate, send messages, fetch conversations, access your agent accounts from your PHP code.

Copyright 2021 Crisp IM SARL. See LICENSE for copying information.

* **📝 Implements**: [REST API Reference (V1)](https://docs.crisp.chat/references/rest-api/v1/) at revision: 12/31/2017
* **😘 Maintainer**: [@baptistejamin](https://github.com/baptistejamin)

## Installation with composer

`composer require crispchat/php-crisp-api`

## Authentication

To authenticate against the API, obtain your authentication token keypair by following the [REST API Authentication](https://docs.crisp.chat/guides/rest-api/authentication/) guide. You'll get a token keypair made of 2 values.

**Keep your token keypair values private, and store them safely for long-term use.**

Then, add authentication parameters to your `client` instance right after you create it:

```php
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new \Crisp\CrispClient;

// Authenticate to API with your plugin token (identifier, key)
// eg. $CrispClient->authenticate("7c3ef21c-1e04-41ce-8c06-5605c346f73e", "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a");
$CrispClient->setTier("plugin");
$CrispClient->authenticate(identifier, key);

// Now, you can use authenticated API sections.
```

## API Overview

You may follow the [REST API Quickstart](https://docs.crisp.chat/guides/rest-api/quickstart/) guide, which will get you running with the REST API in minutes.

```php
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new \Crisp\CrispClient;

$CrispClient->setTier("plugin");
$CrispClient->authenticate(identifier, key);

$profile = $CrispClient->userProfile->get();
$firstName = $profile["first_name"];
echo "Hello $firstName";
```

### Available resources & methods

*Where you see `params` it is a plain Array object, e.g. `[email => 'foo@example.com' ]`*

### Website

* **Website Conversations**
  * **Get Conversations List**: `CrispClient->websiteConversations->getList(websiteId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
  * **Find Conversations With Search**: `CrispClient->websiteConversations->findWithSearch(websiteId, page, searchQuery, searchType, searchOperator, includeEmpty, filterUnread, filterResolved, filterNotResolved, filterMention, filterAssigned, filterUnassigned, filterDateStart, filterDateEnd, orderDateCreated, orderDateUpdated)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
  * **Get A Conversation**: `CrispClient->websiteConversations->getOne(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-conversation)
  * **Get Conversation Metadata**: `CrispClient->websiteConversations->getMeta(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-metas)
  * **Update Conversation Metadata**:`CrispClient->websiteConversations->updateMeta(websiteId, sessionId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-metas)
  * **Get Conversation Messages**: `CrispClient->websiteConversations->getMessages(websiteId, sessionId, timestampBefore)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-messages-in-conversation)
  * **Get Conversation Original Message**:`CrispClient->websiteConversations->getOriginalMessage(websiteId, sessionId, originalId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-an-original-message-in-conversation)
  * **Create a Conversation**: `CrispClient->websiteConversations->create(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-a-new-conversation)
  * **Initiate a Conversation**: `CrispClient->websiteConversations->initiateOne(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#initiate-a-conversation-with-existing-session)
  * **Send a Message in Conversation**: `CrispClient->websiteConversations->sendMessage(websiteId, sessionId, message)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#send-a-message-in-conversation)
  * **Set Conversation State:**: `CrispClient->websiteConversations->setState(websiteId, sessionId, state)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-open-state)
  * **Get Conversation Routing**: `CrispClient->websiteConversations->getRouting(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-routing-assign)
  * **Assign Conversation Routing**:`CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#assign-conversation-routing)
  * **Block Conversation:**: `CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#block-incoming-messages-for-conversation)
  * **Delete Conversation:**:`CrispClient->websiteConversations->deleteOne(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-a-conversation)
  * **Acknowledge Messages as Read:**: `CrispClient->websiteConversations->acknowledgeMessages(websiteId, sessionId, fingerprints)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#mark-messages-as-read-in-conversation)
  * **Schedule a Reminder in a Conversation:**: `CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#schedule-a-reminder-for-conversation)

* **Website People** (These are your End Users). The **PeopleID** argument can be an **email** or the **PeopleID**.

  *  **Find By Email**: `CrispClient->websitePeople->findByEmail(websiteId, email)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
  *  **Find With Search Text (Name, Email, Segments)**: `CrispClient->websitePeople->findWithSearchText(websiteId, searchText)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
  *  **Create A New Profile**: `CrispClient->websitePeople->createNewPeopleProfile(websiteId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-new-people-profile)
  *  **Check If Exists**: `CrispClient->websitePeople->checkPeopleProfileExists(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#check-if-people-profile-exists)
  *  **Get People Profile**: `CrispClient->websitePeople->getPeopleProfile(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
  *  **List People Profiles**: `CrispClient->websitePeople->listPeopleProfiles(websiteId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
  *  **Remove A Profile**: `CrispClient->websitePeople->removePeopleProfile(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-people-profile)
  *  **Save A Profile**: `CrispClient->websitePeople->savePeopleProfile(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-profile)
  *  **Update A Profile**: `CrispClient->websitePeople->updatePeopleProfile(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-profile)
  *  **List Conversations** `CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-conversations)
  *  **List Segments**: `CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-suggested-people-segments)
  *  **List Events**: `CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-events)
  *  **Add Event**: `CrispClient->websitePeople->addPeopleEvent(websiteId, peopleId, event)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-a-people-event)
  *  **Get Data**: `CrispClient->websitePeople->getPeopleData(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-data)
  *  **Save Data**: `CrispClient->websitePeople->savePeopleData(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-data)
  *  **Update Data**: `CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-data)
  *  **Get Subscription Status**: `CrispClient->websitePeople->getPeopleSubscriptionStatus(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-subscription-status)
  *  **Update Subscription Status**: `CrispClient->websitePeople->updatePeopleSubscriptionStatus(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-subscription-status)

* **Website Base**
  * **Create A Website**: `CrispClient->website->create(params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-website)
  * **Delete A Website**: `CrispClient->website->delete(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#delete-a-website)
* **Website Settings**
  * **Get Website Settings**: `CrispClient->websiteSettings->get(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-website-settings)
  * **Update Website Settings**: `CrispClient->websiteSettings->get(params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-website-settings)
* **Website Verify**
  * **Get Verify Settings**: `CrispClient->websiteVerify->getSettings(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-settings)
  * **Update Verify Settings**: `CrispClient->websiteVerify->updateSettings(websiteId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-verify-settings)
  * **Get Verify Key**: `CrispClient->websiteVerify->getKey(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-key)
  * **Roll Key**: `CrispClient->websiteVerify->rollKey(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#roll-verify-key)
* **Website Operators**
  * **Get All Operators**: `CrispClient->websiteOperators->getList(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-website-operators)
  * **Get One Operators**: `CrispClient->websiteOperators->getOne(websiteId, operatorId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-website-operator)
  * **Delete One Operators**: `CrispClient->websiteOperators->deleteOne(websiteId, operatorId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#unlink-operator-from-website)
  * **Update An Operator**: `CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#change-operator-membership)
* **Website Visitors**
  * **List Visitors**: `CrispClient->websiteVisitors->listVisitors(websiteId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-visitors)

### Plugins
* **Plugin Subscriptions**
  * **List All Active Subsciptions**: `CrispClient->pluginSubscriptions->listAllActiveSubscriptions()` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-all-active-subscriptions)
  * **Get All Subscriptions For Website**: `CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-subscriptions-for-a-website)
  * **Get Subscription Details**: `CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-details)
  * **Subscribe Website To Plugin**: `CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#subscribe-website-to-plugin)
  * **Unsubscribe Plugin From Website**: `CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#unsubscribe-plugin-from-website)
  * **Get Subscription Settings**: `CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-settings)
  * **Save Subscription Settings**: `CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings)
