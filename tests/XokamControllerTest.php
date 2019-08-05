<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class XokamControllerTest extends WebTestCase
{
    // public function testRegister()
    // {


    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>'andu',
    //         'PHP_AUTH_PW'=>'code'
    //      ]);      
    //      $crawler = $client->request('POST', '/api/register',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{"username":"lenaa",
    //         "password": "lenaa",
    //         "profil": "8",
    //         "prenom": "nabienne",
    //         "nom": "diongue",
    //         "mail": "nabienne@gmail.com",
    //         "telephone": "778596541",
    //         "adresse": "fass mbao",
    //         "cni": "258963214589",
    //         "statut": "debloquer",
    //         "partenaire": "4",
    //         "compte":"3" }');
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(201,$client->getResponse()->getStatusCode());
    // }

    // public function testAddpartuser()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>'superadmin',
    //         'PHP_AUTH_PW'=>'sowpoulo'
    //      ]);      
    //      $crawler = $client->request('POST', '/api/addpartuser',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{"entreprise":"sow et freres",
    //         "raisonsocial":"SA",
    //         "ninea":"sowfreres201478",
    //         "adresse1":"LabattFall",
    //         "statut1":"debloquer",
    //         "username":"djiby",
    //         "password": "sow",
    //         "prenom": "Ouzby",
    //         "nom": "Sogue",
    //         "mail": "sowfreres@gmail.com",
    //         "telephone": "771007744",
    //         "adresse": "Sebi",
    //         "cni": "2147855447788",
    //         "statut": "debloquer",
    //         "profil":"7",
    //         "solde":"0" }');
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(201,$client->getResponse()->getStatusCode());
    // }

    // public function testLogin()
    // {


    //     $client = static::createClient([],[
    //         // 'PHP_AUTH_USER'=>'mbacke',
    //         // 'PHP_AUTH_PW'=>'mbaye'
    //      ]);      
    //      $crawler = $client->request('POST', '/api/login_check',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{"username":"djiby",
    //         "password": "sow"}');
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(200,$client->getResponse()->getStatusCode());
    // } 

    public function testAddprofil()
    {
        $client = static::createClient([],[
            'PHP_AUTH_USER'=>'superadmin',
            'PHP_AUTH_PW'=>'sowpoulo'
         ]);      
         $crawler = $client->request('POST', '/api/profil',[],[],
        ['CONTENT_TYPE'=>"application/json"],
        '{"libelle":"mam"
        }');
        $rep=$client->getResponse();
        var_dump($rep);
        $this->assertSame(201,$client->getResponse()->getStatusCode());
    }

        
    // public function testAddcompte()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>'superadmin',
    //         'PHP_AUTH_PW'=>'sowpoulo'
    //      ]);      
    //      $crawler = $client->request('POST', '/api/compte',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{"solde":"200000",
    //         "partenaire":"4"
    //     }');
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(201,$client->getResponse()->getStatusCode());
    // }

    //     public function testUserBloquer()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>'superadmin',
    //         'PHP_AUTH_PW'=>'sowpoulo'
    //     ]);
    //         $crawler = $client->request('POST', '/api/users/bloquer',[],[],
    //         ['CONTENT_TYPE'=>"application/json"],
    //         '{"username":"andu"}'
    //     );
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(200,$client->getResponse()->getStatusCode());
    // }

    // public function testUserdebloquer()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>'superadmin',
    //         'PHP_AUTH_PW'=>'sowpoulo'
    //     ]);
    //         $crawler = $client->request('POST', '/api/users/bloquer',[],[],
    //         ['CONTENT_TYPE'=>"application/json"],
    //         '{"username":"andu"}'
    //     );
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(200,$client->getResponse()->getStatusCode());
    // }


}
