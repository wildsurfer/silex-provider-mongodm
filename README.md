silex-provider-mongodm
================================

Mongodm service provider for silex micro-framework. Check here: https://github.com/purekid/mongodm

Example
=======

``` php
<?php
use Silex\Application;

$host = 'localhost:27017';
$db = 'database';
$options = array('w' => 1);
$app = new Application();
$app->register(new MongodmServiceProvider(), array(
            "mongodm.host" => $host,
            "mongodm.db" => $db,
            "mongodm.options" => $options
            ));
$m = $app['mongodm'];
$m->findOne('MyCollection',array('name' => 'my name'));

```

Install with Composer
=====================

``` js
{
require: {
             "wildsurfer/silex-provider-mongodm": "dev-master"
         }
}
```
