<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

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
        $this->actingAs($this->client())->patch('/users/update/{user}', $this->data());
        $response = $this->patch('/users/update/{user}', [
            'id' => $client->id,
            'name' => 'CLIENTNAME',
            'email' => 'CLIENTEMAIL@EMAIL.COM',
            'password' => 'CLIENTPASSWORD',
            'biography' => '',
        ]);
        $this->assertEquals('', $client->biography);
        $response->assertViewIs('users.profile');

        $counsellor = $this->counsellor();
        $this->actingAs($this->counsellor())->patch('/users/update/{user}', $this->data());
        $response = $this->patch('/users/update/{user}', [
            'id' => $counsellor->id,
            'name' => 'COUNSELLORNAME',
            'email' => 'COUNSELLORNEMAIL@EMAIL.COM',
            'password' => 'COUNSELLORPASSWORD',
            'biography' => 'COUNSELLORBIOGRAPHY',
        ]);
        //Counsellor Biography isn't working???
        $this->assertEquals('COUNSELLORBIOGRAPHY', $counsellor->biography);
        $response->assertViewIs('users.profile');
    }

    private function client()
    {
        $client = factory(User::class)->create();
        $client->role = 'Client';
        $client->save();
        return $client;
    }

    private function counsellor()
    {
        $counsellor = factory(User::class)->create();
        $counsellor->role = 'Counsellor';
        $counsellor->save();
        return $counsellor;
    }

    private function admin()
    {
        $admin = factory(User::class)->create();
        $admin->role = 'Admin';
        $admin->save();
        return $admin;
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