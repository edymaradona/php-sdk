## Sequence

#### Get sequences list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$sequence = new \Mailscout\Sequence();
$sequence->lists();
```

###### Option parameters

- limit ( default value 10 )
- searchTerms ( default value null )
- status ( default value null )

#### Add a new sequence

```php
$sequence->add([
    'name' => 'My Sequence',
    'from_name' => 'Mailscout Team',
    'from_email' => 'team@mailscout.io',
    'reply_email' => 'team@mailscout.io',
    'sequences' => [
        [
            'subject' => 'Sequence Email One',
            'body' => 'Sequence Body One',
            'sequence_interval' => 1
        ],
        [
            'subject' => 'Sequence Email Two',
            'body' => 'Sequence Body Two',
            'sequence_interval' => 3
        ]
    ]
]);
```

###### Required field

- name
- from_name
- from_email
- reply_email
- sequences
   - subject
   - body
   - sequence_interval

###### Option fields
- status


#### Get an existing sequence details

```php
$sequence->get(1);

// or

$sequence->find(1);
```

#### Update an existing subscriber

```php
$sequence->update(58, [
    'name' => 'My Sequence',
    'from_name' => 'Mailscout Team',
    'from_email' => 'team@mailscout.io',
    'reply_email' => 'team@mailscout.io',
    'status'=> 'Published',
    'sequences' => [
        [
            'id' => 1,
            'subject' => 'Sequence Email One',
            'body' => 'Sequence Body One',
            'sequence_interval' => 1
        ],
        [
            'id' => 2,
            'subject' => 'Sequence Email Two',
            'body' => 'Sequence Body Two',
            'sequence_interval' => 4
        ]
    ]
]);
```

#### Remove existing sequence

```php
// for deleting single sequence
$sequence->remove([1]);

// for deleting multiple sequences
$sequence->remove([1, 2, 3]);
```

#### Sequence subscription

```php
$sequence->find(1)->subscribe($subscriberId);
```

#### Sequence unsubscription

```php
$sequence->find(1)->unsubscribe($subscriberId);
```

#### Get all sequences

```php
$sequence->all();
```