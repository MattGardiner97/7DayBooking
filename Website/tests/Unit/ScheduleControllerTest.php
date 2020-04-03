<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;

class ScheduleControllerTest extends TestCase
{
    use DatabaseMigrations;
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Show()
    {
        //Ensure logged out users are redirected to the login page
        $response = $this->get("/schedules/show");
        $response->assertLocation("/login");

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get("/schedules/show");
        $response->assertLocation("/");
    }
}