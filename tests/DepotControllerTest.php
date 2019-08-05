<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DepotControllerTest extends WebTestCase
{
    public function testAddDepot()
    {
        $client = static::createClient([],[
            'PHP_AUTH_USER'=>'caissiere',
            'PHP_AUTH_PW'=>'caissiere'
        ]);
            $crawler = $client->request('POST', '/api/depots',[],[],
            ['CONTENT_TYPE'=>"application/json"],
            '{"montant":"500000",
                "compte":"10"}'
        );
        $rep=$client->getResponse();
        var_dump($rep);
        $this->assertSame(201,$client->getResponse()->getStatusCode());
    }
}
