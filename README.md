# Crisp API PHP

## Installation with composer

`composer require crispchat/php-crisp-api`

## Authentication

To authenticate against the API, generate your session identifier and session key **once** using the [Crisp token generation utility](https://go.crisp.chat/account/token/). You'll get a token keypair made of 2 values.

**Keep your token keypair values private, and store them safely for long-term use.**

Then, add authentication parameters to your `client` instance right after you create it:

```js
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new Crisp();

// Authenticate to API (identifier, key)
// eg. $CrispClient->authenticate("7c3ef21c-1e04-41ce-8c06-5605c346f73e", "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a");
$CrispClient->authenticate(identifier, key);

// Now, you can use authenticated API sections.
```

**🔴 Important: Make sure to generate your token once, and use the same token keys in all your subsequent requests to the API. Do not generate too many tokens, as we may invalidate your older tokens to make room for newer tokens.**

## API Overview


```php
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new Crisp();

$CrispClient->authenticate(identifier, key);

$profile = $CrispClient->userProfile->get();
$firstName = $profile["first_name"];
echo "Hello $firstName";
```

### Available resources & methods

*Where you see `params` it is a plain Array object, e.g. `[email => 'foo@example.com' ]`*

### Website

* **Website Conversations**
  * **Get Conversation List**: `CrispClient->websiteConversations->getList(websiteId, page)`
  * **Get A Conversation**: `CrispClient->websiteConversations->getOne(websiteId, sessionId)`
  * **Get Conversation Metadata**: `CrispClient->websiteConversations->getMeta(websiteId, sessionId)`
  * **Update Conversation Metadata**:`CrispClient->websiteConversations->updateMeta(websiteId, sessionId, params)`
  * **Get a Messages in a Conversation**: `CrispClient->websiteConversations->getMessages(websiteId, sessionId, query)`
  * **Create a Conversation**: `CrispClient->websiteConversations->create(websiteId)`
  * **Initiate a Conversation**: `CrispClient->websiteConversations->initiateOne(websiteId, sessionId)`
  * **Send a Conversation**: `CrispClient->websiteConversations->sendMessage(websiteId, sessionId, message)`
  * **Set Conversation State:**: `CrispClient->websiteConversations->setState(websiteId, sessionId, state)`
  * **Get Conversation Routing**: `CrispClient->websiteConversations->getRouting(websiteId, sessionId)`
  * **Assign Conversation Routing**:`CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params)`
  * **Block Conversation:**: `CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked)`
  * **Delete Conversation:**:`CrispClient->websiteConversations->deleteOne(websiteId, sessionId)`
  * **Acknowledge Messages:**: `CrispClient->websiteConversations->acknowledgeMessages(websiteId, sessionId, fingerprints)`
  * **Schedule a Reminder in a Conversation:**: `CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params)`

* **Website People** (These are your End Users). The **PeopleID** argument can be an **email** or the **PeopleID**.

  *  **Find By Email**: `CrispClient->websitePeople->findByEmail(websiteId, email)`
  *  **Find With Search Text (Name, Email, Segments)**: `CrispClient->websitePeople->findWithSearchText(websiteId, searchText)`
  *  **Create A New Profile**: `CrispClient->websitePeople->createNewPeopleProfile(websiteId, params)`
  *  **Check If Exists**: `CrispClient->websitePeople->checkPeopleProfileExists(websiteId, peopleId)`
  *  **Get People Profile**: `CrispClient->websitePeople->getPeopleProfile(websiteId, peopleId)`
  *  **List People Profiles**: `CrispClient->websitePeople->listPeopleProfiles(websiteId, page)`
  *  **Remove A Profile**: `CrispClient->websitePeople->removePeopleProfile(websiteId, peopleId)`
  *  **Save A Profile**: `CrispClient->websitePeople->savePeopleProfile(websiteId, peopleId, params)`
  *  **Update A Profile**: `CrispClient->websitePeople->updatePeopleProfile(websiteId, peopleId, params)`
  *  **List Conversations** `CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, page)`
  *  **List Segments**: `CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, page)`
  *  **List Events**: `CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, page)`
  *  **Add Event**: `CrispClient->websitePeople->addPeopleEvent(websiteId, peopleId, event)`
  *  **Get Data**: `CrispClient->websitePeople->getPeopleData(websiteId, peopleId)`
  *  **Update Data**: `CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params)`

* **Website Base**
  * **Create A Website**: `CrispClient->website->create(params)`
  * **Create User Account**: `CrispClient->website->delete(websiteId)`
* **Website Settings**
  * **Get Website Settings**: `CrispClient->websiteSettings->get(websiteId)`
  * **Update Website Settings**: `CrispClient->websiteSettings->get(params)`
* **Website Verify**
  * **Get Verify Settings**: `CrispClient->websiteVerify->getSettings(websiteId)`
  * **Update Verify Settings**: `CrispClient->websiteVerify->updateSettings(websiteId, params)`
  * **Get Verify Key**: `CrispClient->websiteVerify->getKey(websiteId)`
  * **Roll Key**: `CrispClient->websiteVerify->rollKey(websiteId)`
* **Website Operators**
  * **Get All Operators**: `CrispClient->websiteOperators->getList(websiteId)`
  * **Get One Operators**: `CrispClient->websiteOperators->getOne(websiteId, operatorId)`
  * **Delete One Operators**: `CrispClient->websiteOperators->deleteOne(websiteId, operatorId)`
  * **Update An Operator**: `CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters)`
* **Website Visitors**
  * **List Visitors**: `CrispClient->websiteVisitors->listVisitors(websiteId, page)`

### Plugins
* **Plugin Subscriptions**
  * **List All Active Subsciptions**: `CrispClient->pluginSubscriptions->listAllActiveSubscriptions()`
  * **Get All Subscriptions For Website**: `CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId)`
  * **Get Subscription Details**: `CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId)`
  * **Subscribe Website To Plugin**: `CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId)`
  * **Unsubscribe Plguin From Website**: `CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId)`
  * **Get Subscription Settings**: `CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId)`
  * **Save Subscription Settings**: `CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings)`
