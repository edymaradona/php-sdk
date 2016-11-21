## Automation

#### Get automation list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$automation = new \Mailscout\Automation();
$automation->lists();
```

#### Add a new automation

```php
$automation->add([
    'triggers' => [
        ['type' => 'WEBFORM', 'value' => 1]
    ],
    'actions' => [
       ['type' => 'ADD TAG', 'value' => 1]
    ],
]);
```

###### Available trigger types

- WEBFORM

###### Available action types

- ADD TAG
- REMOVE TAG

#### Remove existing automation

```php
// for deleting single automation
$automation->remove([1]);

// for deleting multiple automation
$automation->remove([1, 2, 3]);
```