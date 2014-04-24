<?php

namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TagsControllerTest extends WebTestCase
{
    public function testGettags()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tags/gettags');
    }

}
