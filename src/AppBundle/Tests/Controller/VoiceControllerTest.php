<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VoiceControllerTest extends WebTestCase
{
    public function testGenerate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/generate');
    }

    public function testPlay()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/play');
    }

}
