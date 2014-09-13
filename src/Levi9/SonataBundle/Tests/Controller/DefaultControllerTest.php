<?php

namespace Levi9\SonataBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(Response::HTTP_MOVED_PERMANENTLY, $client->getResponse()->getStatusCode());
    }

    public function testDashboard()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/dashboard');

        $this->assertTrue($crawler->filter('html:contains("Enumerations")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Granny\'s Jam Delicious")')->count() > 0);
    }
}
