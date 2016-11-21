## MailScout PHP SDK

Email marketing and automation software for eCommerce.

## Installation Process

Just copy php-sdk folder somewhere into your project directory. Then include the autoload file.

```php
require_once('/path/to/php-sdk/autoload.php');
```

Mailscout php-sdk is also available via Composer/Packagist.

```
composer require sun/country
```

## Setup API Token

```php
Mailscout::setApiKey('YOUR_MAILSCOUT_API_TOKEN');
```

## Basic Uses

- [Automation](https://github.com/mailscout/php-sdk/blob/master/docs/automation.md#automation)
- [Subscriber](https://github.com/mailscout/php-sdk/blob/master/docs/subscriber.md#subscriber)
- [Tag](https://github.com/mailscout/php-sdk/blob/master/docs/tag.md#tag)
