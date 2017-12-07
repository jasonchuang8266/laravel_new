<?php

namespace Tests\Feature;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setup()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test  */
    public function test_all_threads()
    {

        $response = $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test  */
    public function test_single_thread()
    {

        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
        
    }
    
    /** @test  */
    
    public function reply_test()
    {
        $reply = factory('App\Reply')
            ->create(['thread_id'=> $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
        
    }
    
    
}
