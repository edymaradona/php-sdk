## Segment

#### Get segments list

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$segment = new \Mailscout\Segment();
$segment->lists();
```

#### Add a new segment

```php
$segment->add([
    'name' => 'Segment name',
    'segments' => [
        [
            'criteria' => 'field_type',
            'field' => 'email',
            'operator' => 'starts with',
            'value' => 'example',
            'comparison_operator' => ''
        ],
        [
            'criteria' => 'field_type',
            'field' => 'first_name',
            'operator' => 'is empty',
            'value' => null,
            'comparison_operator' => 'and'
        ]
    ]
]);
```

###### Available fields

- email
- first_name
- last_name
- country
- ip
- status
- photo_url
- subscription_date
- browser
- unsubscription_date

###### Available operators

- is
- is not
- starts with
- ends with
- contains
- does not contains
- is empty
- is not empty

#### Get an existing segment

```php
$segment->get(1);

// or

$segment->find(1);
```

#### Update an existing segment

```php
$segment->update(1, [
    'name' => 'New segemnt name',
    'segments' => [
        [
            'criteria' => 'field_type',
            'field' => 'email',
            'operator' => 'ends with',
            'value' => 'example',
            'comparison_operator' => ''
        ],
        [
            'criteria' => 'field_type',
            'field' => 'first_name',
            'operator' => 'is empty',
            'value' => null,
            'comparison_operator' => 'and'
        ]
    ]
]);
```

#### Remove existing segment

```php
// for deleting single segment
$segment->remove([1]);

// for deleting multiple segment
$segment->remove([1, 2, 3]);
```

#### Get all segmented subscribers

```php
$segment->getSegmentedSubscribers($segmentId);
```

#### Get subscriber preview based on segment data

```php
$segment->subscribersPreview([
    'data' => json_encode([
        'name' => 'Segment name',
        'segments' => [
            [
                'criteria' => 'field_type',
                'field' => 'email',
                'operator' => 'starts with',
                'value' => 'example',
                'comparison_operator' => ''
            ],
            [
                'criteria' => 'field_type',
                'field' => 'first_name',
                'operator' => 'is empty',
                'value' => '',
                'comparison_operator' => 'and'
            ]
        ]
    ])
]);
```