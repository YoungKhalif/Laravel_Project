<?php

namespace Tests\Feature;

<<<<<<< HEAD
// use Illuminate\Foundation\Testing\RefreshDatabase;
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
