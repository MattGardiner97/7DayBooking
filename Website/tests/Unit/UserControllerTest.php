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
        $client = $this->client();
        $this->assertTrue($client->save(), "Couldn't create client.");
        $response = $this->actingAs($client)->get('/appointments/new');
        $response->assertLocation('/');

        $counsellor = $this->counsellor();
        $this->assertTrue($counsellor->save(), "Couldn't create Counsellor.");
        $response = $this->actingAs($counsellor)->get('/schedules/show');
        $response->assertLocation('/');

        $admin = $this->admin();
        $this->assertTrue($admin->save(), "Couldn't create Admin.");
        $response = $this->actingAs($admin)->get('/admin/verify');
        $response->assertLocation('/');
    }

    public function testUpdateUserDetails()
    {
        $this->withoutExceptionHandling();

        $client = $this->client();
        $this->assertTrue($client->save(), "Couldn't create client.");
        $response = $this->actingAs($client)->get('/users/profile');
        $response->assertLocation('/');
        $this->actingAs($this->client())->patch('/users/update/{user}', $this->data());
        $response = $this->patch('/users/update/{user}', [
            'id' => $client->id, 'name' => 'TESTNAME', 'email' => 'TESTEMAIL@EMAIL.COM', 'password' => 'PASSWORD', 'biography' => ''
        ]);



        $counsellor = $this->counsellor();
        $this->assertTrue($counsellor->save(), "Couldn't create Counsellor.");
        $response = $this->actingAs($counsellor)->get('/users/profile');
        $response->assertLocation('/');
        $this->actingAs($this->client())->patch('/users/update/{user}', $this->data());
        $response = $this->patch('/users/update/{user}', [
            'id' => $counsellor->id, 'name' => 'TESTNAME', 'email' => 'TESTEMAIL@EMAIL.COM', 'password' => 'PASSWORD', 'biography' => 'TEST BIOGRAPHY'
        ]);
    }

    private function client()
    {
        $user = factory(User::class)->create();
        return $user;
    }

    private function counsellor()
    {
        $user = factory(User::class)->create();
        $user->role = 'Counsellor';
        $user->save();
        return $user;
    }

    private function admin()
    {
        $user = factory(User::class)->create();
        $user->role = 'Admin';
        $user->save();
        return $user;
    }

    private function data()
    {
        return [
            'id' => '1',
            'name' => '1',
            'email' => '1',
            'password' => '2020-01-01',
            'biography' => '10',
        ];
    }
    
}
