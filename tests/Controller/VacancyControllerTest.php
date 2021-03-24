<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VacancyControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testEndpointsAreSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        self::assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls()
    {
        return [
            ['/vacancies', 'GET'],
            ['/vacancies/1', 'GET'],
            ['/matching/best', 'GET'],
        ];
    }
}
