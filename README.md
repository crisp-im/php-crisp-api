# Crisp API PHP

The Crisp API PHP wrapper. Authenticate, send messages, fetch conversations, access your agent accounts from your PHP code.

Copyright 2022 Crisp IM SAS. See LICENSE for copying information.

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
    * `CrispClient->websiteConversations->getList(websiteId, pageNumber)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pageNumber = 1;

      CrispClient->websiteConversations->getList(websiteId, pageNumber);
      ```
      </details>

  * ⭐ **Create a Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-a-new-conversation)
    * `CrispClient->websiteConversations->create(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteConversations->create(websiteId);
      ```
      </details>

  * **Initiate a Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#initiate-a-conversation-with-existing-session)
    * `CrispClient->websiteConversations->initiateOne(websiteId, sessionId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      CrispClient->websiteConversations->initiateOne(websiteId, sessionId);
      ```
      </details>

  * **Find Conversations With Search** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-conversations)
    * `CrispClient->websiteConversations->findWithSearch(websiteId, pageNumber, searchQuery, searchType, searchOperator, includeEmpty, filterUnread, filterResolved, filterNotResolved, filterMention, filterAssigned, filterUnassigned, filterDateStart, filterDateEnd, orderDateCreated, orderDateUpdated)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pageNumber = 1;

      CrispClient->websiteConversations->getList(websiteId, pageNumber);
      ```
      </details>

  * ⭐ **Get A Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-conversation)
    * `CrispClient->websiteConversations->getOne(websiteId, sessionId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      CrispClient->websiteConversations->getOne(websiteId, sessionId);
      ```
      </details>

  * ⭐ **Send a Message in Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#send-a-message-in-conversation)
    * `CrispClient->websiteConversations->sendMessage(websiteId, sessionId, message)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      $message = [
        "type" => "text",
        "from" => "operator",
        "origin" => "chat",
        "content" => "Hey there! Need help?"
      ];

      CrispClient->websiteConversations->sendMessage(websiteId, sessionId, message);
      ```
      </details>

  * ⭐ **Get Conversation Metas** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-metas)
    * `CrispClient->websiteConversations->getMeta(websiteId, sessionId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      CrispClient->websiteConversations->getMeta(websiteId, sessionId);
      ```
      </details>

  * ⭐ **Update Conversation Metas** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-metas)
    * `CrispClient->websiteConversations->updateMeta(websiteId, sessionId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      $params = [
        "nickname" => "John Doe",
        "email" => "john.doe@acme-inc.com",
        "segments" => [
          "happy",
          "customer",
          "love"
        ],
        "data" => [
          "type" => "customer",
          "signup" => "finished"
        ]
      ];

      CrispClient->websiteConversations->updateMeta(websiteId, sessionId, params);
      ```
      </details>

  * ⭐ **Get Messages in Conversation** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-messages-in-conversation)
    * `CrispClient->websiteConversations->getMessages(websiteId, sessionId, timestampBefore)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";
      $timestampBefore = 1641206011000;

      CrispClient->websiteConversations->getMessages(websiteId, sessionId, timestampBefore);
      ```
      </details>

  * **Get Conversation Original Message** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-an-original-message-in-conversation)
    * `CrispClient->websiteConversations->getOriginalMessage(websiteId, sessionId, originalId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";
      $originalId = "2325a3c0-9b47-4fc6-b00e-111b752e44cd";

      CrispClient->websiteConversations->getOriginalMessage(websiteId, sessionId, originalId);
      ```
      </details>

  * ⭐ **Change Conversation State** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-conversation-open-state)
    * `CrispClient->websiteConversations->setState(websiteId, sessionId, state)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      $state = true;

      CrispClient->websiteConversations->setState(websiteId, sessionId, state);
      ```
      </details>

  * **Get Conversation Routing** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-conversation-routing-assign)
    * `CrispClient->websiteConversations->getRouting(websiteId, sessionId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      CrispClient->websiteConversations->getRouting(websiteId, sessionId);
      ```
      </details>

  * **Assign Conversation Routing** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#assign-conversation-routing)
    * `CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      $params = [
        "assigned" => [
          "user_id" => "a4c32c68-be91-4e29-8a05-976e93abbe3f"
        ]
      ];

      CrispClient->websiteConversations->assignRouting(websiteId, sessionId, params);
      ```
      </details>

  * **Block Conversation:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#block-incoming-messages-for-conversation)
    * `CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      $blocked = true;

      CrispClient->websiteConversations->setBlock(websiteId, sessionId, blocked);
      ```
      </details>

  * **Delete Conversation:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-a-conversation)
    * `CrispClient->websiteConversations->deleteOne(websiteId, sessionId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      CrispClient->websiteConversations->deleteOne(websiteId, sessionId);
      ```
      </details>

  * **Acknowledge Messages as Read:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#mark-messages-as-read-in-conversation)
    * `CrispClient->websiteConversations->acknowledgeMessages(websiteId, sessionId, fingerprints)`
    * <details>
      <summary>See Example</summary>

      ```php
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
      ```
      </details>

  * **Schedule a Reminder in a Conversation:** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#schedule-a-reminder-for-conversation)
    * `CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $sessionId = "session_700c65e1-85e2-465a-b9ac-ecb5ec2c9881";

      $params = [
        "date" => "2018-05-29T09:00:00Z",
        "note" => "Call this customer."
      ];

      CrispClient->websiteConversations->scheduleReminder(websiteId, sessionId, params);
      ```
      </details>



* **Website People** _(these are your end-users)_

  * **Find By Email** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
    * `CrispClient->websitePeople->findByEmail(websiteId, email)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websitePeople->findByEmail(websiteId, email);
      ```
      </details>

  * **Find With Search Text (Name, Email, Segments)** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
    * `CrispClient->websitePeople->findWithSearchText(websiteId, searchText)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websitePeople->findWithSearchText(websiteId, searchText);
      ```
      </details>

  * **Create A New Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-new-people-profile)
    * `CrispClient->websitePeople->createNewPeopleProfile(websiteId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      $params = [
        "email" => "valerian@crisp.chat",
        "person" => [
          "nickname" => "Valerian Saliou"
        ]
      ];

      CrispClient->websitePeople->createNewPeopleProfile(websiteId, params);
      ```
      </details>

  * ⭐ **Check If Exists** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#check-if-people-profile-exists)
    * `CrispClient->websitePeople->checkPeopleProfileExists(websiteId, peopleId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      CrispClient->websitePeople->checkPeopleProfileExists(websiteId, peopleId);
      ```
      </details>

  * ⭐ **Get People Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-profile)
    * `CrispClient->websitePeople->getPeopleProfile(websiteId, peopleId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websitePeople->findByEmail(websiteId, email);
      ```
      </details>

  * ⭐ **List People Profiles** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-profiles)
    * `CrispClient->websitePeople->listPeopleProfiles(websiteId, pageNumber)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websitePeople->findWithSearchText(websiteId, searchText);
      ```
      </details>

  * ⭐ **Remove A Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#remove-people-profile)
    * `CrispClient->websitePeople->removePeopleProfile(websiteId, peopleId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      CrispClient->websitePeople->removePeopleProfile(websiteId, peopleId);
      ```
      </details>

  * ⭐ **Save A Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-profile)
    * `CrispClient->websitePeople->savePeopleProfile(websiteId, peopleId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      $params = [
        "email" => "valerian@crisp.chat",
        "person" => [
          "nickname" => "Valerian Saliou"
        ]
      ];

      CrispClient->websitePeople->savePeopleProfile(websiteId, peopleId, params);
      ```
      </details>

  * ⭐ **Update A Profile** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-profile)
    * `CrispClient->websitePeople->updatePeopleProfile(websiteId, peopleId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      $params = [
        "email" => "valerian@crisp.chat",
        "person" => [
          "nickname" => "Valerian Saliou"
        ]
      ];

      CrispClient->websitePeople->updatePeopleProfile(websiteId, peopleId, params);
      ```
      </details>

  * **List Conversations** [`user`, `plugin`] [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-conversations)
    * `CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, pageNumber)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";
      $pageNumber = 1;

      CrispClient->websitePeople->listPeopleConversations(websiteId, peopleId, pageNumber);
      ```
      </details>

  * **List Segments** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-suggested-people-segments)
    * `CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, pageNumber)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";
      $pageNumber = 1;

      CrispClient->websitePeople->listPeopleSegments(websiteId, peopleId, pageNumber);
      ```
      </details>

  * **List Events** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-people-events)
    * `CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, pageNumber)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";
      $pageNumber = 1;

      CrispClient->websitePeople->listPeopleEvent(websiteId, peopleId, pageNumber);
      ```
      </details>

  * **Add Event** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#add-a-people-event)
    * `CrispClient->websitePeople->addPeopleEvent(websiteId, peopleId, event)`
    * <details>
      <summary>See Example</summary>

      ```php
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
      ```
      </details>

  * **Get Data** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-data)
    * `CrispClient->websitePeople->getPeopleData(websiteId, peopleId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      CrispClient->websitePeople->getPeopleData(websiteId, peopleId);
      ```
      </details>

  * **Save Data** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-people-data)
    * `CrispClient->websitePeople->savePeopleData(websiteId, peopleId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      $params = [
        "data" => [
          "type" => "customer",
          "signup" => "finished"
        ]
      ];

      CrispClient->websitePeople->savePeopleData(websiteId, peopleId, params);
      ```
      </details>

  * **Update Data** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-data)
    * `CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      $params = [
        "data" => [
          "signup" => "finished"
        ]
      ];

      CrispClient->websitePeople->updatePeopleData(websiteId, peopleId, params);
      ```
      </details>

  * **Get Subscription Status** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-people-subscription-status)
    * `CrispClient->websitePeople->getPeopleSubscriptionStatus(websiteId, peopleId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      CrispClient->websitePeople->getPeopleSubscriptionStatus(websiteId, peopleId);
      ```
      </details>

  * **Update Subscription Status** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-people-subscription-status)
    * `CrispClient->websitePeople->updatePeopleSubscriptionStatus(websiteId, peopleId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $peopleId = "c5a2f70c-f605-4648-b47f-8c39d4b03a50";

      $params = [
        "email" => true
      ];

      CrispClient->websitePeople->updatePeopleSubscriptionStatus(websiteId, peopleId, params);
      ```
      </details>

_👉 Notice: The `peopleID` argument can be an email or the `peopleID`._



* **Website Base**

  * **Create A Website** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#create-website)
    * `CrispClient->website->create(params)`
    * <details>
      <summary>See Example</summary>

      ```php
      CrispClient->website->create(params);
      ```
      </details>

  * **Delete A Website** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#delete-a-website)
    * `CrispClient->website->delete(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->website->delete(websiteId);
      ```
      </details>



* **Website Settings**

  * **Get Website Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-website-settings)
    * `CrispClient->websiteSettings->get(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteSettings->get(websiteId);
      ```
      </details>

  * **Update Website Settings** [`user`, `plugin`][Reference](https://docs.crisp.chat/references/rest-api/v1/#update-website-settings):
    * `CrispClient->websiteSettings->get(params)`



* **Website Verify**

  * **Get Verify Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-settings)
    * `CrispClient->websiteVerify->getSettings(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteVerify->getSettings(websiteId);
      ```
      </details>

  * **Update Verify Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#update-verify-settings)
    * `CrispClient->websiteVerify->updateSettings(websiteId, params)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      $params = [
        "enabled" => true
      ];

      CrispClient->websiteVerify->updateSettings(websiteId, params);
      ```
      </details>

  * **Get Verify Key** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-verify-key)
    * `CrispClient->websiteVerify->getKey(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteVerify->getKey(websiteId);
      ```
      </details>

  * **Roll Key** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#roll-verify-key)
    * `CrispClient->websiteVerify->rollKey(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteVerify->rollKey(websiteId);
      ```
      </details>



* **Website Operators**

  * **Get All Operators** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-website-operators)
    * `CrispClient->websiteOperators->getList(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteOperators->getList(websiteId);
      ```
      </details>

  * **Get One Operators** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-a-website-operator)
    * `CrispClient->websiteOperators->getOne(websiteId, operatorId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $operatorId = "d14ce289-f759-43c8-8854-00c57fb7e5d5";

      CrispClient->websiteOperators->getOne(websiteId, operatorId);
      ```
      </details>

  * **Delete One Operators** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#unlink-operator-from-website)
    * `CrispClient->websiteOperators->deleteOne(websiteId, operatorId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $operatorId = "d14ce289-f759-43c8-8854-00c57fb7e5d5";

      CrispClient->websiteOperators->deleteOne(websiteId, operatorId);
      ```
      </details>

  * **Update An Operator** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#change-operator-membership)
    * `CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $operatorId = "d14ce289-f759-43c8-8854-00c57fb7e5d5";

      $parameters = [
        "role" => "owner",
        "title" => "CTO"
      ];

      CrispClient->websiteOperators->updateOne(websiteId, operatorId, parameters);
      ```
      </details>



* **Website Visitors**

  * **List Visitors** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-visitors)
    * `CrispClient->websiteVisitors->listVisitors(websiteId, pageNumber)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pageNumber = 1;

      CrispClient->websiteVisitors->listVisitors(websiteId, pageNumber);
      ```
      </details>



* **Website Availability**

  * **Get Availability Status** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-website-availability-status)
    * `CrispClient->websiteAvailability->getAvailabilityStatus(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteAvailability->getAvailabilityStatus(websiteId);
      ```
      </details>

  * **List Operator Availabilities** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-website-operator-availabilities)
    * `CrispClient->websiteAvailability->listOperatorAvailabilities(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->websiteAvailability->listOperatorAvailabilities(websiteId);
      ```
      </details>



### Plugins

* **Plugin Subscriptions**

  * **List All Active Subsciptions** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-all-active-subscriptions)
    * `CrispClient->pluginSubscriptions->listAllActiveSubscriptions()`
    * <details>
      <summary>See Example</summary>

      ```php
      CrispClient->pluginSubscriptions->listAllActiveSubscriptions();
      ```
      </details>

  * **Get All Subscriptions For Website** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#list-subscriptions-for-a-website)
    * `CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->pluginSubscriptions->listSubscriptionsForWebsite(websiteId);
      ```
      </details>

  * **Get Subscription Details** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-details)
    * `CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";

      CrispClient->pluginSubscriptions->getSubscriptionDetails(websiteId);
      ```
      </details>

  * **Subscribe Website To Plugin** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#subscribe-website-to-plugin)
    * `CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

      $pluginId = "98454664-9f7d-4d95-a9ce-f37356f5e65a";

      CrispClient->pluginSubscriptions->subscribeWebsiteToPlugin(websiteId, pluginId);
      ```
      </details>

  * **Unsubscribe Plugin From Website** [`user`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#unsubscribe-plugin-from-website)
    * `CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

      CrispClient->pluginSubscriptions->unsubscribePluginFromWebsite(websiteId, pluginId);
      ```
      </details>

  * **Get Subscription Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#get-subscription-settings)
    * `CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

      CrispClient->pluginSubscriptions->getSubscriptionSettings(websiteId, pluginId);
      ```
      </details>

  * **Save Subscription Settings** [`user`, `plugin`]: [Reference](https://docs.crisp.chat/references/rest-api/v1/#save-subscription-settings)
    * `CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings)`
    * <details>
      <summary>See Example</summary>

      ```php
      $websiteId = "8c842203-7ed8-4e29-a608-7cf78a7d2fcc";
      $pluginId = "c64f3595-adee-425a-8d3a-89d47f7ed6bb";

      $settings = [
        "chatbox" => [
          "25" => "#bbbbbb"
        ]
      ];

      CrispClient->pluginSubscriptions->saveSubscriptionSettings(websiteId, pluginId, settings);
      ```
      </details>
