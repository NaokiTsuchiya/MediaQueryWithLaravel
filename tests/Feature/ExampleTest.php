<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/media');

        $response->assertStatus(200);
        $response->assertJson(
            ['id' => 1, 'name' => 'test']
        );
    }
}
