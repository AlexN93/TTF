<?php
namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MappingControllerTest extends WebTestCase
{

    public function testPostMappingAction0()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/mappings',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"a": false, "b": true, "c": true, "d": 1, "e": 2, "f" : 3}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertTrue($client->getResponse()->isOk());
        $response = json_decode($client->getResponse()->getContent());
        $this->assertEquals("T", $response->data->x);
        $this->assertEquals(0.97, $response->data->y);
    }

    public function testPostMappingAction1()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/mappings',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"a": true, "b": true, "c": false, "d": 1, "e": 2, "f" : 3}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertTrue($client->getResponse()->isOk());
        $response = json_decode($client->getResponse()->getContent());
        $this->assertEquals("T", $response->data->x);
        $this->assertEquals(0.97, $response->data->y);
    }

    public function testPostMappingAction2()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/mappings',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"a": true, "b": false, "c": true, "d": 1, "e": 2, "f" : 3}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertTrue($client->getResponse()->isOk());
        $response = json_decode($client->getResponse()->getContent());
        $this->assertEquals("S", $response->data->x);
        $this->assertEquals(4.02, $response->data->y);
    }

    public function testPostMappingAction3()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/mappings',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"a": true, "b": true, "c": true, "d": 1, "e": 2, "f" : 3}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertTrue($client->getResponse()->isOk());
        $response = json_decode($client->getResponse()->getContent());
        $this->assertEquals("R", $response->data->x);
        $this->assertEquals(2.02, $response->data->y);
    }

    public function testPostMappingAction400()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/mappings',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"a": false, "b": false, "c": false}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $response = json_decode($client->getResponse()->getContent());
    }

    public function testPostMappingAction404()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/v1/mappings',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"a": false, "b": false, "c": false, "d": 1, "e": 2, "f" : 3}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $response = json_decode($client->getResponse()->getContent());
    }
}