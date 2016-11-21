## Subscriber

#### Get subscribers list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$subscriber = new \Mailscout\Subscriber();
$suscriber->lists();
```

###### Option parameters

- limit ( default value 10 )
- searchTerms
- status

#### Add a new subscriber

```php
$subscriber->add([
    'email' => 'mail@example.com'
]);
```

###### Required field

- email

###### Option fields

- first_name
- last_name
- country
- ip
- status
- browser

#### Get an existing subscriber details

```php
$subscriber->get(1);

// or

$subscriber->find(1);
```

#### Update an existing subscriber

```php
$subscriber->update(1, [
    'email' => 'newmail@example.com'
]);
```

#### Remove existing subscriber

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
