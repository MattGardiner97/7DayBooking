<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        $response = $this->actingAs($this->client())->post('/users/update', $this->clientData());
        $client = User::where('id', '1')->first();
        $this->assertEquals('clientName', $client->name);
        $this->assertEquals('client@email.com', $client->email);
        $this->assertEquals('clientBiography', $client->biography);

        $response = $this->actingAs($this->client())->post('/users/update', $this->counsellorData());
        $counsellor = User::where('id', '2')->first();
        $this->assertEquals('counsellorName', $counsellor->name);
        $this->assertEquals('counsellor@email.com', $counsellor->email);
        $this->assertEquals('counsellorBiography', $counsellor->biography);
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

    private function clientData()
    {
        return [
            'id' => '1',
            'name' => 'clientName',
            'email' => 'client@email.com',
            'biography' => 'clientBiography'
        ];
    }

    private function counsellorData()
    {
        return [
            'id' => '2',
            'name' => 'counsellorName',
            'email' => 'counsellor@email.com',
            'biography' => 'counsellorBiography'
        ];
    }
}