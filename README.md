# Crisp API Node

## Installation with composer

`composer require crispchat/php-crisp-api`


## API Overview


```php
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new Crisp();

```

To use Crisp, first, you have to login

```php
$CrispClient->userSession->loginWithEmail("yourEmail@gmail.com", "your_password");
$CrispClient->userProfile->get();
```

When you are logged you can then use the Crisp API

```php
$profile = $CrispClient->userProfile->get();
$firstName = $profile["first_name"];
echo "Hello $firstName";
```

### Available resources & methods

*Where you see `params` it is a plain Array object, e.g. `[email => 'foo@example.com' ]`*

  * userSession
    * `loginWithEmail(email, password)`
    * `recoverPassword(email)`
    * `logout()`
  * userAccount
    * `get()`
    * `create(params)`
  * userNotification
    * `get()`
    * `update(params)`
  * userProfile
    * `get()`
    * `update(params)`
  * userSchedule
    * `get()`
    * `update(params)`
  * userWebsites
    * `get()`
  * emailSubscription
    * `get(emailHash, key)`
    * `update(emailHash, key, subscription)`
  * website
    * `create(params)`
    * `delete(websiteId)`
  * websiteSettings
    * `get(websiteId)`
    * `update(websiteId)`
  * websiteStatisitcs
    * `get(websiteId)`
    * `getAllStatistics(websiteId)`
    * `countTotalNumberOfConversations(websiteId)`
    * `countNumberOfPendingConversations(websiteId)`
    * `countNumberOfUnresolvedConversations(websiteId)`
    * `countNumberOfResolvedConversations(websiteId)`
    * `countNumberOfUnreadMessages(websiteId)`

  * websiteConversations
    * `listConversations(websiteId, page = 0`
    * `searchConversations(websiteId, page = 0, searchQuery, searchType)`
  * websiteConversation
    * `createNewConversation(websiteId)`
    * `checkConversationExists(websiteId, sessionId)`
    * `getConversation(websiteId, sessionId)`
    * `removeConversation(websiteId, sessionId)`
    * `initiateConversationWithExistingSession(websiteId, sessionId)`
    * `getMessagesInConversation(websiteId, sessionId)`
    * `sendMessageInConversation(websiteId, sessionId, message)`
    * `composeMessageInConversation(websiteId, sessionId, compose)`
    * `markMessagesReadInConversation(websiteId, sessionId, read)`
    * `getConversationMetas(websiteId, sessionId)`
    * `updateConversationMetas(websiteId, sessionId, metas)`
    * `getConversationState(websiteId, sessionId)`
    * `changeConversationState(websiteId, sessionId, state)`
    * `getBlockStatusForConversation(websiteId, sessionId, metas)`
    * `blockIncomingMessagesForConversation(websiteId, sessionId)`
    * `getConversationState(websiteId, sessionId)`
  * websiteOperators
    * `getList(websiteId)`
    * `getOne(websiteId, operatorId)`
    * `deleteOne(websiteId, operatorId)`
    * `createOne(websiteId, parameters)`
    * `updateOne(websiteId, operatorId, parameters)`
  * pluginSubscriptions
    * `listAllActiveSubscriptions()`
    * `listSubscriptionsForWebsite(websiteId)`
    * `getSubscriptionDetails(websiteId)`
    * `subscribeWebsiteToPlugin(websiteId, pluginId)`
    * `unsubscribePluginFromWebsite(websiteId, pluginId)`
    * `getSubscriptionSettings(websiteId, pluginId)`
    * `saveSubscriptionSettings(websiteId, pluginId, settings)`
