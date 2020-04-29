<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testCreateUser()
    {
        $client = factory(User::class)->create();
        $client->role = "Client";
        $this->assertTrue($client->save(), "Couldn't create client.");

        $counsellor = factory(User::class)->create();
        $counsellor->role = "Counsellor";
        $this->assertTrue($counsellor->save(), "Couldn't create Counsellor.");

        $admin = factory(User::class)->create();
        $admin->role = "Admin";
        $this->assertTrue($admin->save(), "Couldn't create Admin.");

        $result = "Client: " . $client . " Counsellor: " . $counsellor . " Admin: " . $admin;
        
        return $result;
    }

    public function testUpdateUserDetails()
    {

    }
}
