## Setting

#### Get all settings

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$setting = new \Mailscout\Setting();
$setting->all();
```

#### Set SMTP settings

```php
$setting->setSMTP([
    'mail_host' => 'smtp@example.com',
    'mail_port' => '547',
    'mail_username' => 'username',
    'mail_password' => 'password',
    'mail_encryption' => 'tls',
    'mail_from_address' => 'mail@example.com',
    'mail_from_name' => 'Mail',
]);
```