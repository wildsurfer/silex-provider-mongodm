<?php

namespace Wildsurfer\Tests\Provider;

use Silex\Application;
use Silex\Provider\SerializerServiceProvider;
use Wildsurfer\Provider\MongodmServiceProvider;

/*
 * MongodmServiceProviderTest
 */
class IsdkServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /*
     * testRegister
     */
    public function testRegister()
    {
        $host = 'localhost:27017';
        $db = 'database';
        $app = new Application();
        $app->register(new MongodmServiceProvider(), array(
            "mongodm.host" => $host,
            "mongodm.db" => $db
        ));
        $m = $app['mongodm'];
        $this->assertInstanceOf("\Purekid\Mongodm\MongoDB", $m);
        $this->assertTrue($m->connect(), true);
        $this->assertInstanceOf('\MongoDB', $m->getDB());
    }
}
