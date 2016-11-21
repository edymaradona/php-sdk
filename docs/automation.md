## Automation

#### Get automations list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$automation = new \Mailscout\Automation();
$automation->lists();
```

###### Option parameters

- limit ( default value 10 )
- searchTerms ( default value null )
- status ( default value null )

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