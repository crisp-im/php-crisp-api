# Crisp API PHP

The Crisp API PHP wrapper. Authenticate, send messages, fetch conversations, access your agent accounts from your PHP code.

Copyright 2021 Crisp IM SAS. See LICENSE for copying information.

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


All the available Crisp API resources are fully implemented. **Programmatic methods names are named after their label name in the [REST API Reference](https://docs.crisp.chat/references/rest-api/v1/)**.

All methods that you will most likely need when building a Crisp integration are prefixed with a star symbol (⭐).

*Where you see `params` it is a plain Array object, e.g. `[email => 'foo@example.com' ]`*

**⚠️ Note that, depending on your authentication token tier, which is either `user` or `plugin`, you may not be allowed to use all methods from the library. When in doubt, refer to the library method descriptions below. Most likely, you are using a `plugin` token.**

### Website

* **Website Conversations**
  * ⭐ **List Conversations** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
    * `CrispClient->websiteConversations->getList(websiteId, page)` 
  * ⭐ **Create a Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-a-new-conversation)
    * `CrispClient->websiteConversations->create(websiteId)` 
  * **Initiate a Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#initiate-a-conversation-with-existing-session)
    * `CrispClient->websiteConversations->initiateOne(websiteId, sessionId)` 
  * **Find Conversations With Search** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
    * `CrispClient->websiteConversations->findWithSearch(websiteId, page, searchQuery, searchType, searchOperator, includeEmpty, filterUnread, filterResolved, filterNotResolved, filterMention, filterAssigned, filterUnassigned, filterDateStart, filterDateEnd, orderDateCreated, orderDateUpdated)` 
  * ⭐ **Get A Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-conversation)
    * `CrispClient->websiteConversations->getOne(websiteId, sessionId)` 
  * ⭐ **Send a Message in Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#send-a-message-in-conversation)
    * `CrispClient->websiteConversations->sendMessage(websiteId, sessionId, message)` 
  * ⭐ **Get Conversation Metas** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-metas)
    * `CrispClient->websiteConversations->getMeta(websiteId, sessionId)` 
  * ⭐ **Update Conversation Metas** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-metas)
    * `CrispClient->websiteConversations->updateMeta(websiteId, sessionId, params)` 
  * ⭐ **Get Messages in Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-messages-in-conversation)
    * `CrispClient->websiteConversations->getMessages(websiteId, sessionId, timestampBefore)` 
  * **Get Conversation Original Message** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-an-original-message-in-conversation)
    * `CrispClient->websiteConversations->getOriginalMessage(websiteId, sessionId, originalId)` 
  * ⭐ **Change Conversation State** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-open-state)
    * `CrispClient->websiteConversations->setState(websiteId, sessionId, state)` 
  * **Get Conversation Routing** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-routing-assign)
    * `CrispClient->websiteConversations->getRouting(websiteId, sessionId)` 
  * **Assign Conversation Routing** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#assign-conversation-routing)
    * `CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params)` 
  * **Block Conversation:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#block-incoming-messages-for-conversation)
    * `CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked)` 
  * **Delete Conversation:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-a-conversation)
    * `CrispClient->websiteConversations->deleteOne(websiteId, sessionId)` 
  * **Acknowledge Messages as Read:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#mark-messages-as-read-in-conversation)
    * `CrispClient->websiteConversations->acknowledgeMessages(websiteId, sessionId, fingerprints)` 
  * **Schedule a Reminder in a Conversation:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#schedule-a-reminder-for-conversation)
    * `CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params)` 

* **Website People** _(these are your end-users)_
  * **Find By Email** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
    * `CrispClient->websitePeople->findByEmail(websiteId, email)` 
  * **Find With Search Text (Name, Email, Segments)** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
    * `CrispClient->websitePeople->findWithSearchText(websiteId, searchText)` 
  * **Create A New Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-new-people-profile)
    * `CrispClient->websitePeople->createNewPeopleProfile(websiteId, params)` 
  * ⭐ **Check If Exists** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#check-if-people-profile-exists)
    * `CrispClient->websitePeople->checkPeopleProfileExists(websiteId, peopleId)` 
  * ⭐ **Get People Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
    * `CrispClient->websitePeople->getPeopleProfile(websiteId, peopleId)` 
  * ⭐ **List People Profiles** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
    * `CrispClient->websitePeople->listPeopleProfiles(websiteId, page)` 
  * ⭐ **Remove A Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-people-profile)
    * `CrispClient->websitePeople->removePeopleProfile(websiteId, peopleId)` 
  * ⭐ **Save A Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-profile)
    * `CrispClient->websitePeople->savePeopleProfile(websiteId, peopleId, params)` 
  * ⭐ **Update A Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-profile)
    * `CrispClient->websitePeople->updatePeopleProfile(websiteId, peopleId, params)` 
  * **List Conversations** [`user`, `plugin`] [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-conversations)
    * `CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, page)` 
  * **List Segments** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-suggested-people-segments)
    * `CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, page)` 
  * **List Events** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-events)
    * `CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, page)` 
  * **Add Event** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-a-people-event)
    * `CrispClient->websitePeople->addPeopleEvent(websiteId, peopleId, event)` 
  * **Get Data** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-data)
    * `CrispClient->websitePeople->getPeopleData(websiteId, peopleId)` 
  * **Save Data** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-data)
    * `CrispClient->websitePeople->savePeopleData(websiteId, peopleId, params)` 
  * **Update Data** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-data)
    * `CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params)` 
  * **Get Subscription Status** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-subscription-status)
    * `CrispClient->websitePeople->getPeopleSubscriptionStatus(websiteId, peopleId)` 
  * **Update Subscription Status** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-subscription-status)
    * `CrispClient->websitePeople->updatePeopleSubscriptionStatus(websiteId, peopleId, params)` 

_👉 Notice: The `peopleID` argument can be an email or the `peopleID`._

* **Website Base**
  * **Create A Website** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-website)
    * `CrispClient->website->create(params)` 
  * **Delete A Website** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#delete-a-website)
    * `CrispClient->website->delete(websiteId)` 
* **Website Settings**
  * **Get Website Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-website-settings)
    * `CrispClient->websiteSettings->get(websiteId)` 
  * **Update Website Settings** [`user`, `plugin`][Reference](https://docs.crisp.chat/references/rest-api/v1/#update-website-settings): 
    * `CrispClient->websiteSettings->get(params)` 
* **Website Verify**
  * **Get Verify Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-settings)
    * `CrispClient->websiteVerify->getSettings(websiteId)` 
  * **Update Verify Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-verify-settings)
    * `CrispClient->websiteVerify->updateSettings(websiteId, params)` 
  * **Get Verify Key** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-key)
    * `CrispClient->websiteVerify->getKey(websiteId)` 
  * **Roll Key** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#roll-verify-key)
    * `CrispClient->websiteVerify->rollKey(websiteId)` 
* **Website Operators**
  * **Get All Operators** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-website-operators)
    * `CrispClient->websiteOperators->getList(websiteId)` 
  * **Get One Operators** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-website-operator)
    * `CrispClient->websiteOperators->getOne(websiteId, operatorId)` 
  * **Delete One Operators** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#unlink-operator-from-website)
    * `CrispClient->websiteOperators->deleteOne(websiteId, operatorId)` 
  * **Update An Operator** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#change-operator-membership)
    * `CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters)` 
* **Website Visitors**
  * **List Visitors** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-visitors)
    * `CrispClient->websiteVisitors->listVisitors(websiteId, page)` 

### Plugins
* **Plugin Subscriptions**
  * **List All Active Subsciptions** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-all-active-subscriptions)
    * `CrispClient->pluginSubscriptions->listAllActiveSubscriptions()` 
  * **Get All Subscriptions For Website** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-subscriptions-for-a-website)
    * `CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId)` 
  * **Get Subscription Details** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-details)
    * `CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId)` 
  * **Subscribe Website To Plugin** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#subscribe-website-to-plugin)
    * `CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId)` 
  * **Unsubscribe Plugin From Website** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#unsubscribe-plugin-from-website)
    * `CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId)` 
  * **Get Subscription Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-settings)
    * `CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId)` 
  * **Save Subscription Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings)
    * `CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings)` 
