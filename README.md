silex-provider-infusionsoft-isdk
================================

Infusionsoft iSDK service provider for silex micro-framework

Example
=======

``` php
<?php
use Silex\Application;

$key = 'secretkey';
$appName = 'appname';

$app = new Application();
$app->register(new IsdkServiceProvider(), array(
    'isdk.key' => $key,
    'isdk.appName' => $appName
));

$paymentOptions = $app['isdk']->getAllPaymentOptions();
```

Install with Composer
=====================

``` js
  {
      require: {
          "wildsurfer/silex-provider-infusionsoft-isdk": "dev-master"
      }
  }
```
