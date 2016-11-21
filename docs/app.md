## App

#### Get available apps

```php
\Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');

$app = new \Mailscout\App();
$app->lists();
```

#### Install apps

```php
$app->install($appId);
```

#### UnInstall apps

```php
$app->uninstall($appId);
```