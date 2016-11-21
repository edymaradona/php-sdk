## Webform

#### Get webform list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$webform = new \Mailscout\Webform();
$webform->lists();
```

#### Add a new webform

```php
$webform->add([
    'title' => 'Webform title'
]);
```

#### Get an existing webform

```php
$webform->get(1);

// or

$webform->find(1);
```

#### Update an existing webform

```php
$webform->update(1, [
    'title' => 'New webform title',
    'description' => 'New webform description',
    'submit_button_text' => 'Submit',
    'message' => [
        'success' => 'Confirmation email send',
        'error' => 'You are already subscribed.'
    ]
]);
```

#### Remove existing webform

```php
// for deleting single template
$webform->remove([1]);

// for deleting multiple template
$webform->remove([1, 2, 3]);
```

#### Get embeded webform

```php
$webform->embededWebform($webformId);
```

#### Add subscriber from webform

```php
$webform->addSubscriber($webformId, $subscriberEmail);
```

#### Get webform script

```php
$webform->script($webformId);
```

#### Get webform script and landing page links

```php
$webform->links($webformId);
```