## Template

#### Get templates list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$template = new \Mailscout\Template();
$template->lists();
```

#### Add a new template

```php
$template->add([
    'name' => 'Template content',
    'content' => 'Template content'
]);
```

#### Get an existing template

```php
$template->get(1);

// or

$template->find(1);
```

#### Update an existing template

```php
$template->update(1, [
    'name' => 'New template name'
]);
```

#### Remove existing template

```php
// for deleting single template
$template->remove([1]);

// for deleting multiple template
$template->remove([1, 2, 3]);
```

#### Get all template without pagination

```php
$template->all()
```