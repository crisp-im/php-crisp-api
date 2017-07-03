# Crisp API PHP

## Installation with composer

`composer require crispchat/php-crisp-api`

## Authentication

To authenticate against the API, generate your session identifier and session key **once** using the following cURL request in your terminal (replace `YOUR_ACCOUNT_EMAIL` and `YOUR_ACCOUNT_PASSWORD`):

```bash
curl -H "Content-Type: application/json" -X POST -d '{"email":"YOUR_ACCOUNT_EMAIL","password":"YOUR_ACCOUNT_PASSWORD"}' https://api.crisp.chat/v1/user/session/login
```

If authentication succeeds, you will get a JSON response containing your authentication keys: `identifier` and `key`. **Keep those 2 values private, and store them safely for long-term use**.

Then, add authentication parameters to your `client` instance right after you create it:

```js
require __DIR__ . '/vendor/autoload.php';
$CrispClient = new Crisp();

// Authenticate to API (identifier, key)
// eg. $CrispClient->authenticate("7c3ef21c-1e04-41ce-8c06-5605c346f73e", "cc29e1a5086e428fcc6a697d5837a66d82808e65c5cce006fbf2191ceea80a0a");
$CrispClient->authenticate(identifier, key);

// Now, you can use authenticated API sections.
```

**🔴 Important: Be sure to login once, and re-use the same authentication keys (same `identifier` + `key`) in all your subsequent requests to the API. Do not generate new tokens from your code for every new request to the API (you will be heavily rate-limited; that will induce HTTP failures for some of your API calls).**

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
