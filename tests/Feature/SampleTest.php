<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET', 'www.cube.cn:8090/api/wb/engineer/info');
        $response->assertStatus(200);

        #$this->assertTrue(true);
    }
}
