# TransferWise PHP Client

[![Build Status](https://travis-ci.org/belovai/transferwise-php-client.svg?branch=master)](https://travis-ci.org/belovai/transferwise-php-client)
[![Build Status](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/badges/build.png?b=master)](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/belovai/transferwise-php-client/?branch=master)


## Important notes

- It is **NOT** an official TransferWise package!
- Under development, currently **NOT** ready and **NOT** recommended for use

## Usage

You will need to create a config object:
```php
$config = new TransferWiseConfig(
                'https://api.sandbox.transferwise.tech/v1/', 
                'my-api-key'
            );
```

### Address

You should create an addresses object:
```php
$addresses = new Addresses($config);
```

#### List of addresses belonging to user profile.
```php
foreach ($addresses->getAll($profileId) as $address) {
    echo $address->id . PHP_EOL;
    echo $address->profile . PHP_EOL;
    echo $address->details->city . PHP_EOL;
}
```

#### Get address info by id.
```php
$address = $addresses->getById($addressId);
echo $address->id . PHP_EOL;
echo $address->details->city . PHP_EOL;
```

### Profiles

You should create a profiles object:
```php
$profiles = new Profiles($config);
```

#### List of all profiles belonging to user.
```php
foreach ($profiles->getAll() as $profile) {
    echo $profile->id . PHP_EOL;
    echo $profile->type . PHP_EOL;
    echo $profile->details->lastName . PHP_EOL;
}
```

#### Get profile info by id.
```php
$profile = $profiles->getById($profileId);
echo $profile->id . PHP_EOL;
echo $profile->type . PHP_EOL;
echo $profile->details->lastName . PHP_EOL;
```

### Rates

You should create a rates object:
```php
$rates = new Rates($config);
```

#### Fetch latest exchange rates of all currencies.
```php
// It takes very long time
var_dump($rates->getAll());
```

#### Fetch latest exchange rates of all currencies agenst the given currency.
```php
var_dump($rates->getAllBySource("EUR"));
```

#### Fetch latest exchange rates of all currencies agenst the given currency.
```php
var_dump($rates->getAllByTarget("EUR"));
```

#### Fetch latest exchange rate of one currency pair.
```php
var_dump($rates->getPair("EUR", "USD"));
```

#### Fetch exchange rate of specific historical timestamp.
```php
var_dump($rates->getPairAt("EUR", "USD", "2018-11-01 12:00:00"));
var_dump($rates->getPairAt("EUR", "USD", new \DateTime("2018-11-01 12:00:00")));
```

#### Fetch exchange rate history over period of time with daily interval.
```php
var_dump($rates->getPairInterval("EUR", "USD", "2018-10-01 12:00:00", "2018-11-01 12:00:00", Rates::GROUP_DAILY));
var_dump($rates->getPairInterval("EUR", "USD", new \DateTime("2018-10-01 12:00:00"), new \DateTime("2018-11-01 12:00:00"), Rates::GROUP_DAILY));
```

#### Fetch exchange rate history over period of time with hourly interval.
```php
var_dump($rates->getPairInterval("EUR", "USD", "2018-10-01 12:00:00", "2018-11-01 12:00:00", Rates::GROUP_HOURLY));
var_dump($rates->getPairInterval("EUR", "USD", new \DateTime("2018-10-01 12:00:00"), new \DateTime("2018-11-01 12:00:00"), Rates::GROUP_HOURLY));
```

#### Fetch exchange rate history over period of time with every 10 minutes interval.
```php
var_dump($rates->getPairInterval("EUR", "USD", "2018-10-01 12:00:00", "2018-11-01 12:00:00", Rates::GROUP_10_MINS));
var_dump($rates->getPairInterval("EUR", "USD", new \DateTime("2018-10-01 12:00:00"), new \DateTime("2018-11-01 12:00:00"), Rates::GROUP_10_MINS));
```