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

## Create your own bot!

```php
//Get your websites
$CrispClient->userWebistes->get();
//Get some conversations
$CrispClient->webisteConversations->getList("WEBSITE_ID", 0);
$CrispClient->websiteConversations->sendTextMessage("WEBSITE_ID", "SESSION_ID", "I'm a bot");
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
  * website
    * `create(params)`
    * `delete(websiteId)`
  * websiteSettings
    * `get()`
    * `update(websiteId)`
  * websiteConversations
    * `getList(websiteId, page)`
    * `getOne(websiteId, sessionId)`
    * `sendTextMessage(websiteId, sessionId, text)`
    * `setState(websiteId, sessionId, state)`
    * `setEmail(websiteId, sessionId, email)`
    * `setNickname(websiteId, sessionId, nickname)`
    * `setBlock(websiteId, sessionId, blocked)`
    * `deleteOne(websiteId, sessionId)`
    * `acknowledgeMessages(websiteId, sessionId, fingerprints)`
  * websiteOperators
    * `getList(websiteId)`
    * `getOne(websiteId, operatorId)`
    * `deleteOne(websiteId, operatorId)`
    * `createOne(websiteId, parameters)`
    * `updateOne(websiteId, operatorId, parameters)`
