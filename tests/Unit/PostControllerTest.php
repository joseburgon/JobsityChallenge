<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\Post;

class PostControllerTest extends TestCase
{
    /** @test */
    function it_displays_the_index_page()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->make();
        $response = $this->actingAS($user)->get('/posts');
        $response->assertStatus(200);
    }
    
    /** @test */
    function it_displays_the_create_page()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->make();
        $response = $this->actingAS($user)->get('/posts/create');
        $response->assertStatus(200);
    }
    
    /**
     * A basic unit test example.
     *
     * @test
     */
    function it_stores_a_valid_post()
    {
        $this->withoutExceptionHandling();
        $attributes = factory(Post::class)->make();

        $data = [
            'user_id' => 30,
            'category_id' => $attributes->category_id,
            'name' => $attributes->name,
            'slug' => $attributes->slug,
            'excerpt' => $attributes->excerpt,
            'body' => $attributes->body,
            'status' => 'PUBLISHED',
            'tags' => [rand(1, 20), rand(1, 20)]
        ];

        $response = $this->actingAS(User::find(30))->post('posts', $data);
        $post = Post::orderBy('id', 'DESC')->first();
        $response->assertRedirect("/posts/{$post->id}/edit");
    }

    /** @test */
    function it_displays_the_show_page()
    {
        $this->withoutExceptionHandling();
        $post = Post::where('user_id', 30)->first();
        $response = $this->actingAS(User::find(30))->get("/posts/{$post->id}");
        $response->assertStatus(200);
    }

    /** @test */
    function it_displays_the_edit_page()
    {
        $this->withoutExceptionHandling();
        $post = Post::where('user_id', 30)->first();
        $response = $this->actingAS(User::find(30))->get("/posts/{$post->id}/edit");
        $response->assertStatus(200);
    }

    /** @test */
    function it_updates_valid_post()
    {
        $this->withoutExceptionHandling();
        $post = Post::where('user_id', 30)->orderBy('id', 'DESC')->first();
        $attributes = factory(Post::class)->make();

        $data = [
            'user_id' => 30,
            'category_id' => $attributes->category_id,
            'name' => $attributes->name,
            'slug' => $attributes->slug,
            'excerpt' => $attributes->excerpt,
            'body' => $attributes->body,
            'status' => 'PUBLISHED',
            'tags' => [rand(1, 20), rand(1, 20)]
        ];

        $response = $this->actingAS(User::find(30))->put("/posts/{$post->id}", $data);
        $response->assertRedirect("/posts/{$post->id}/edit");
        $response->assertSessionHas("info");        
    }

    /** @test */
    function it_deletes_post()
    {
        
        $this->withoutExceptionHandling();
        $post = Post::where('user_id', 30)->orderBy('id', 'DESC')->first();
        $response = $this->actingAS(User::find(30))->delete("/posts/{$post->id}");
        $response->assertRedirect('/');
        $response->assertSessionHas("info", 'Post Deleted!'); 
    }

}
