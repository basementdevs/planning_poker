<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuestRegisterTest extends TestCase{
    use RefreshDatabase;

    public function testBasic()
    {
        $response = $this->get('/');//

        $response->assertStatus(200);
    }
}
