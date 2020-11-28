<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRouteToHome()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
    }
}
