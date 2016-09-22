<?php
/**
 * Created by PhpStorm.
 * User: IYusuff
 * Date: 6/22/2016
 * Time: 3:28 PM
 */
require('vendor/autoload.php');

class PropertyTypeIntTests extends PHPUnit_Framework_TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
           'base_uri' =>  'http://192.168.99.100'
        ]);
    }

    /**
     * Test for GET
     */
    public function testGet()
    {
        try {
        $response = $this->client->get('/propertytype');
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        echo("\n" . $response->getBody());
        $this->assertArrayHasKey('data', $data);
//        $this->assertEquals(1, $data['userId']);
        } catch (ClientException $e) {
            if ($e->getCode() !== 404) {
                echo("\n" . "Get operation failed with 404 error.");
            }
        }
    }



//    /**
//     * Test for POST
//     */
//    public function testPost(){
//        $response = $this->client->post('/posts',
//            [
//                'json'=>
//                [
//                    'title' => 'foo',
//                    'body' => 'bar',
//                    'userId'=> 1
//                ]
//            ]
//        );
//        $this->assertEquals(201, $response->getStatusCode());
//        $data = json_decode($response->getBody(), true);
////        echo("\n" . $response->getBody());
//        $this->assertArrayHasKey('id', $data);
//        $this->assertGreaterThan(1, $data['id']);
//    }
//    /**
//     * Test for PUT
//     */
//    public function testPut(){
//        $id = 1;
//        $response = $this->client->put('/posts/' . $id,
//            [
//                'json'=>
//                    [
//                        'id' => 1,
//                        'title' => 'foo',
//                        'body' => 'bar',
//                        'userId'=> 1
//                    ]
//            ]
//        );
//        $this->assertEquals(200, $response->getStatusCode());
//        $data = json_decode($response->getBody(), true);
////        echo("\n" . $response->getBody());
//        $this->assertArrayHasKey('id', $data);
//        $this->assertEquals($id, $data['id']);
//    }
//    /**
//     * Test for DELETE
//     */
//    public function testDelete(){
//        $id = 1;
//        $response = $this->client->delete('/posts/' . $id);
//        $this->assertEquals(200, $response->getStatusCode());
//    }


}