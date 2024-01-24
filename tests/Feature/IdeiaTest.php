<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IdeiaTest extends TestCase
{
    /** @test */
    public function only_logged_in_users_can_see_ideias_list(): void
    {
        $response = $this->get('/ideias')
            ->assertRedirect('/login');
    }
}
