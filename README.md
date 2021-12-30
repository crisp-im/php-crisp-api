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
  * **Get Conversations List** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->getList(websiteId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
  * **Find Conversations With Search** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->findWithSearch(websiteId, page, searchQuery, searchType, searchOperator, includeEmpty, filterUnread, filterResolved, filterNotResolved, filterMention, filterAssigned, filterUnassigned, filterDateStart, filterDateEnd, orderDateCreated, orderDateUpdated)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
  * **Get A Conversation** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->getOne(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-conversation)
  * **Get Conversation Metadata** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->getMeta(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-metas)
  * **Update Conversation Metadata* [`user`, `plugin`]*:
    * `CrispClient->websiteConversations->updateMeta(websiteId, sessionId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-metas)
  * **Get Conversation Messages** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->getMessages(websiteId, sessionId, timestampBefore)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-messages-in-conversation)
  * **Get Conversation Original Message* [`user`, `plugin`]*:
    * `CrispClient->websiteConversations->getOriginalMessage(websiteId, sessionId, originalId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-an-original-message-in-conversation)
  * **Create a Conversation** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->create(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-a-new-conversation)
  * **Initiate a Conversation** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->initiateOne(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#initiate-a-conversation-with-existing-session)
  * **Send a Message in Conversation**: `CrispClient->websiteConversations->sendMessage(websiteId, sessionId, message)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#send-a-message-in-conversation)
  * **Set Conversation State:** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->setState(websiteId, sessionId, state)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-open-state)
  * **Get Conversation Routing** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->getRouting(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-routing-assign)
  * **Assign Conversation Routing* [`user`, `plugin`]*:
    * `CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#assign-conversation-routing)
  * **Block Conversation:** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#block-incoming-messages-for-conversation)
  * **Delete Conversation:* [`user`, `plugin`]*:
    * `CrispClient->websiteConversations->deleteOne(websiteId, sessionId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-a-conversation)
  * **Acknowledge Messages as Read:** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->acknowledgeMessages(websiteId, sessionId, fingerprints)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#mark-messages-as-read-in-conversation)
  * **Schedule a Reminder in a Conversation:** [`user`, `plugin`]: 
    * `CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#schedule-a-reminder-for-conversation)

* **Website People** (These are your End Users). The **PeopleID** argument can be an **email** or the **PeopleID**.

  *  **Find By Email** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->findByEmail(websiteId, email)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
  *  **Find With Search Text (Name, Email, Segments)** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->findWithSearchText(websiteId, searchText)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
  *  **Create A New Profile** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->createNewPeopleProfile(websiteId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-new-people-profile)
  *  **Check If Exists** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->checkPeopleProfileExists(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#check-if-people-profile-exists)
  *  **Get People Profile** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->getPeopleProfile(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
  *  **List People Profiles** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->listPeopleProfiles(websiteId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
  *  **Remove A Profile** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->removePeopleProfile(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-people-profile)
  *  **Save A Profile** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->savePeopleProfile(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-profile)
  *  **Update A Profile** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->updatePeopleProfile(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-profile)
  *  **List Conversations* [`user`, `plugin`]* 
    * `CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-conversations)
  *  **List Segments** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-suggested-people-segments)
  *  **List Events** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-events)
  *  **Add Event** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->addPeopleEvent(websiteId, peopleId, event)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-a-people-event)
  *  **Get Data** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->getPeopleData(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-data)
  *  **Save Data** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->savePeopleData(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-data)
  *  **Update Data** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-data)
  *  **Get Subscription Status** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->getPeopleSubscriptionStatus(websiteId, peopleId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-subscription-status)
  *  **Update Subscription Status** [`user`, `plugin`]: 
    * `CrispClient->websitePeople->updatePeopleSubscriptionStatus(websiteId, peopleId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-subscription-status)

* **Website Base**
  * **Create A Website** [`user`, `plugin`]: 
    * `CrispClient->website->create(params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-website)
  * **Delete A Website** [`user`, `plugin`]: 
    * `CrispClient->website->delete(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#delete-a-website)
* **Website Settings**
  * **Get Website Settings** [`user`, `plugin`]: 
    * `CrispClient->websiteSettings->get(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-website-settings)
  * **Update Website Settings** [`user`, `plugin`]: 
    * `CrispClient->websiteSettings->get(params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-website-settings)
* **Website Verify**
  * **Get Verify Settings** [`user`, `plugin`]: 
    * `CrispClient->websiteVerify->getSettings(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-settings)
  * **Update Verify Settings** [`user`, `plugin`]: 
    * `CrispClient->websiteVerify->updateSettings(websiteId, params)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-verify-settings)
  * **Get Verify Key** [`user`, `plugin`]: 
    * `CrispClient->websiteVerify->getKey(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-key)
  * **Roll Key** [`user`, `plugin`]: 
    * `CrispClient->websiteVerify->rollKey(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#roll-verify-key)
* **Website Operators**
  * **Get All Operators** [`user`, `plugin`]: 
    * `CrispClient->websiteOperators->getList(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-website-operators)
  * **Get One Operators** [`user`, `plugin`]: 
    * `CrispClient->websiteOperators->getOne(websiteId, operatorId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-website-operator)
  * **Delete One Operators** [`user`, `plugin`]: 
    * `CrispClient->websiteOperators->deleteOne(websiteId, operatorId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#unlink-operator-from-website)
  * **Update An Operator** [`user`, `plugin`]: 
    * `CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#change-operator-membership)
* **Website Visitors**
  * **List Visitors** [`user`, `plugin`]: 
    * `CrispClient->websiteVisitors->listVisitors(websiteId, page)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-visitors)

### Plugins
* **Plugin Subscriptions**
  * **List All Active Subsciptions** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->listAllActiveSubscriptions()` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-all-active-subscriptions)
  * **Get All Subscriptions For Website** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-subscriptions-for-a-website)
  * **Get Subscription Details** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-details)
  * **Subscribe Website To Plugin** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#subscribe-website-to-plugin)
  * **Unsubscribe Plugin From Website** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#unsubscribe-plugin-from-website)
  * **Get Subscription Settings** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-settings)
  * **Save Subscription Settings** [`user`, `plugin`]: 
    * `CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings)` [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings)
