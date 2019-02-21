<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DependientesControllerTest extends WebTestCase
{
    public function testDepartamentos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Departamentos');
    }

}
