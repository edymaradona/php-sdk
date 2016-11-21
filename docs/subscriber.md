## Subscriber

#### Get subscribers

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$subscriber = new \Mailscout\Subscriber();
$suscriber->retrieve();
```

#### Add subscriber

```php
$subscriber->add([
    'email' => 'mail@example.com'
]);
```

#### Get a subscriber details

```php
$subscriber->get(1);

// or

$subscriber->find(1);
```

#### Update a existing subscriber

```php
$subscriber->update(1, [
    'email' => 'newmail@example.com'
]);
```

#### Remove subscriber

```php
// for deleting single subscriber
$subscriber->remove([1]);

// for deleting multiple subscriber
$subscriber->remove([1, 2, 3]);
```

#### Unsubscribe an existing subscriber

```php
$token = $subscriber->find(1)->unsubscription_token;

$subscriber->unsubscribe($token);
```

#### Import subscribers from CSV file

```php
$subscriber->import($_FILE['csv']);
```
