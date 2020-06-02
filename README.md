# piuszenoph-sms
This package is a PHP laravel package meant to send sms to all networks in Ghana through Zenoph SMS GH server

[![Issues](https://img.shields.io/github/issues/geekpius/piuszenoph-sms)](https://packagist.org/packages)
[![Forks](https://img.shields.io/github/forks/geekpius/piuszenoph-sms)](https://packagist.org/packages)
[![Stars](https://img.shields.io/github/stars/geekpius/piuszenoph-sms)](https://packagist.org/packages)
[![License](https://img.shields.io/github/license/geekpius/piuszenoph-sms)](https://packagist.org/packages)
[![Twitter](https://img.shields.io/twitter/url?url=https%3A%2F%2Fgithub.com%2Fgeekpius%2Fpiuszenoph-sms)](https://packagist.org/packages)

## Requirements

- PHP >=7.0
- Laravel >=5.6


## Getting started

- composer require piuszenoph/sms
- Integration in Laravel
  - Copy the following to config/app.php (if not available)
    - "providers": 
            [
                "ZenophSmsGh\\Sms\\SmsServiceProvider"
            ],
    - "aliases": {
                "ZenophSMSGH": "ZenophSmsGh\\Sms\\Facades"
            }

## Code Examples
Error codes https://smsonlinegh.com/download.php?file=http-sms-api

```php
/***** non personalised ****/
// contact numbers. Each must be separated by a comma 
$contacts = "0289348779,0581068534,0239597999";
$send = ZenophSMSGH::sendNonPersonalizedSms('username', 'password', 'PIUSGEEK','This is a developed laravel package to send sms',$contacts);
$response = explode('@', $send);
if($response[0]==1400){
    // return success message
    return 'Success Message';
}
else{
    //return the caused error
    return $response[1];
} 


/***** other ****/
// contact numbers. Each must be separated by a comma 
//$contacts = "0289348779,0581068534,0239597999";
ZenophSMSGH::sendFlashSms(string username, string password, string message, string contacts)
ZenophSMSGH::getBalance(string username, string password)

```

## Contributing

Contributions to the PiusZenophSMSGH library are welcome.

## License

PiusZenophSMSGH is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2020 
