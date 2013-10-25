<?php

namespace Wildsurfer\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Purekid\Mongodm\MongoDB;

/*
 * MongodmServiceProvider
 */
class MongodmServiceProvider implements ServiceProviderInterface
{
    /*
     * register
     */
    public function register(Application $app)
    {
        $app['mongodm'] = $app->share(function() use ($app) {
            MongoDB::setConfigBlock('default', array(
                'connection' => array(
                    'hostnames' => $app['mongodm.host'],
                    'database'  => $app['mongodm.db'],
                    'options'  => $app['mongodm.options']
                )
            ));
            return MongoDB::instance();
        });
    }

    /*
     * boot
     */
    public function boot(Application $app)
    {
    }
}
