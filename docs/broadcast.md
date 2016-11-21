## Broadcast

#### Get broadcasts list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$broadcast = new \Mailscout\Broadcast();
$broadcast->lists();
```

###### Option parameters

- limit ( default value 10 )
- searchTerms ( default value null )
- status ( default value null )

#### Add a new broadcast

```php
$broadcast->add([
    'subject' => 'Email Subject',
    'body' => 'Email body',
    'from_email' => 'mail@example.com',
    'from_name' => 'Mail',
    'reply_name' => 'mail@example.com',
    'tags' => ['General']
]);
```

#### Send a broadcast email

```php
$broadcast->send($broadcastId);
```

You also can change email delivery time by providing delivery time into the send method as second parameter.

```php
$data = [
    'delivery_time' => [
        'date' => '2016-11-21',
        'hour' => '11',
        'min' => '01',
        'timezone' => 'Asia\Dhaka'
    ]
];

$broadcast->send($broadcastId, $data);
```

Sometimes, you want to test your broadcast email, right?? Here, an example how can you send your test broadcast email.

```php
$data = [
    'test_mode' => true
];

$broadcast->send($broadcastId, $data);
```

#### Get an existing broadcast

```php
$broadcast->get(1);

// or

$broadcast->find(1);
```

#### Update an existing broadcast

```php
$broadcast->update(1, [
    'subject' => 'New email Subject',
    'body' => 'New email body',
    'from_email' => 'mail@example.com',
    'from_name' => 'Mail',
    'reply_name' => 'mail@example.com',
    'tags' => ['General', 'New tag']
]);
```

#### Remove existing broadcast

```php
// for deleting single broadcast
$broadcast->remove([1]);

// for deleting multiple broadcast
$broadcast->remove([1, 2, 3]);
```

#### Get current broadcast status of your team

```php
$broadcast->currentStatus();
```

#### Get broadcast by broadcast status

```php
$status = Broadcast::$DELIVERED;

$broadcast->status($status);
```

###### Available broadcast status

- Broadcast::$DRAFTED
- Broadcast::$PENDING
- Broadcast::$PROCESSING
- Broadcast::$DELIVERED