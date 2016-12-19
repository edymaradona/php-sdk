## Event

#### Event push

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$event = new \Mailscout\Event();
$event->push('tag.added', [
    'tag_id' => 1,
    'subscriber_id' => 1,
    'extra_data' => []
]);
```

###### Available events

- tag.added