<?php

namespace Wildsurfer\Tests\Provider;

use Silex\Application;
use Silex\Provider\SerializerServiceProvider;
use Wildsurfer\Provider\MongodmServiceProvider;
use ReflectionClass;
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
        $options = array('w' => 1);
        $app = new Application();
        $app->register(new MongodmServiceProvider(), array(
            "mongodm.host" => $host,
            "mongodm.db" => $db,
            "mongodm.options" => $options
        ));
        $m = $app['mongodm'];

        $this->assertInstanceOf("\Purekid\Mongodm\MongoDB", $m);
        $this->assertTrue($m->connect(), true);
        $this->assertInstanceOf('\MongoDB', $m->getDB());

        $config = $m::config('default');
        $c = $config['connection'];

        $this->assertEquals($c['hostnames'], $host);
        $this->assertEquals($c['database'], $db);
        $this->assertEquals($c['options'], $options);
    }
}
