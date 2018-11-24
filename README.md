# TransferWise PHP Client

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
