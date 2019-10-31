<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;

class LoginTest extends TestCase
{
    // @test
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }    
    
    // @test
    public function it_loads_the_posts_list_page_when_authenticated()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('posts')
        ->assertStatus(200);
    }
}
