# Laravel Fast2Sms Package By Krishn Patel


[![Latest Stable Version](https://poser.pugx.org/krishn/fst2sms/v/stable)](https://packagist.org/packages/krishn/fst2sms)
[![Total Downloads](https://poser.pugx.org/krishn/fst2sms/downloads)](https://packagist.org/packages/krishn/fst2sms)
[![License](https://poser.pugx.org/krishn/fst2sms/license)](https://packagist.org/packages/krishn/fst2sms)


For Laravel 5.0 and above

## Introduction
Integrate fast2sms in your laravel application easily with this package. This package uses official Fast2Sms API's.

## License
Fast2Sms Package open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Getting Started
To get started add the following package to your `composer.json` file using this command.

    composer require krishn/fst2sms

## Configuring
**Note: For Laravel 5.5 and above auto-discovery takes care of below configuration.**

When composer installs Laravel Fast2Sms library successfully, register the `Krishn\Fst2Sms\Fst2SmsServiceProvider` in your `config/app.php` configuration file.

```php
'providers' => [
    // Other service providers...
    Krishn\Fst2Sms\Fst2SmsServiceProvider::class,
],
```
Also, add the `Fst2Sms` facade to the `aliases` array in your `app` configuration file:

```php
'aliases' => [
    // Other aliases
    'Fst2Sms' => Krishn\Fst2Sms\Facades\Fst2SmsFacade::class,
],
```
#### Add the fast2sms credentials to the `.env` file
```bash
FST2SMS_AUTHORIZATION_KEY=YOUR_API_KEY
```
Note : All the credentials mentioned are provided by Fast2Sms after signing up as merchant.

## Usage


### Send sms using Quick Transactionsl route
```php
<?php

namespace App\Http\Controllers;

use Fst2Sms;

class SendSmsController extends Controller
{
    
    public function sendSms()
    {
        Fst2Sms::prepare([
            "sender_id" => "FSTSMS",
            "language" => "english",
            "route" => "qt",
            "numbers" => "9999999999,8888888888,7777777777",
            "message" => "YOUR_QT_SMS_ID",
            "variables" => "{#AA#}|{#CC#}",
            "variables_values" => "12345|asdaswdx"
        ]);
        echo Fst2Sms::send();
    }
  
}
```
