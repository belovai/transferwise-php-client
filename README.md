# TransferWise PHP Client

[![Build Status](https://travis-ci.org/belovai/transferwise-php-client.svg?branch=master)](https://travis-ci.org/belovai/transferwise-php-client)
[![Build Status](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/badges/build.png?b=master)](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/?branch=master)


## Important notes

- It is **NOT** an official TransferWise package!
- Under development, currently **NOT** ready and **NOT** recommended for use

## Usage

### Profiles

#### List of all profiles belonging to user.
```php
$config = new TransferWiseConfig(
                'https://api.sandbox.transferwise.tech/v1/', 
                'my-api-key'
            );
$profiles = new Profiles($config);
foreach ($profiles->all() as $profile) {
    echo $profile->getId() . PHP_EOL;
    echo $profile->getType() . PHP_EOL;
    echo $profile->getDetails()->lastName . PHP_EOL;
}
```
