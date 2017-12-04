<?php

namespace Tests\Feature;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    public function testBasicTest()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
        
        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
        
    }
}
