<?php

namespace Tests\Feature;

use App\Appointment;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{

    // will setup and tear down database each time test is ran
    use RefreshDatabase;

    public function test_an_appointment_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->client())->post('/appointments', $this->data());

        $this->assertCount(1, Appointment::all());

        $response->assertViewIs('appointments.confirmed');
    }

    public function test_an_appointment_must_have_a_client()
    {
        $response = $this->actingAs($this->client())->post('/appointments', array_merge($this->data(), [ 'client_id' => '']));

        $response->assertSessionHasErrors('client_id');
    }

    public function test_an_appointment_must_have_a_counsellor()
    {
        $response = $this->actingAs($this->client())->post('/appointments', array_merge($this->data(), [ 'counsellor_id' => '']));

        $response->assertSessionHasErrors('counsellor_id');
    }

    public function test_an_appointment_must_have_a_date()
    {
        $response = $this->actingAs($this->client())->post('/appointments', array_merge($this->data(), [ 'date' => '']));

        $response->assertSessionHasErrors('date');
    }

    public function test_an_appointment_must_have_a_time()
    {
        $response = $this->actingAs($this->client())->post('/appointments', array_merge($this->data(), [ 'time' => '']));

        $response->assertSessionHasErrors('time');
    }

    public function test_an_appointment_can_be_deleted()
    {
        $this->actingAs($this->client())->post('/appointments', $this->data());

        $appointment = Appointment::first();
        $this->assertCount(1, Appointment::all());

        $response = $this->delete('/appointments' . '/' . $appointment->id);

        $this->assertCount(0, Appointment::all());
        $response->assertViewIs('appointments.cancelled');
    }

    public function test_an_appointment_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->client())->post('/appointments', $this->data());

        $appointment = Appointment::first();

        $response = $this->post('/appointments', [
            'id' => $appointment->id, 'counsellor_id' => '1', 'client_id' => '1', 'date' => '2020-01-01', 'time' => '12'
        ]);

        $this->assertEquals('12', Appointment::first()->time);
        $response->assertViewIs('appointments.changed');
    }

    private function data()
    {
        return [
            'id' => '-1',
            'counsellor_id' => '1',
            'client_id' => '1',
            'date' => '2020-01-01',
            'time' => '10',
        ];
    }

    private function counsellor()
    {
        $result = factory(User::class)->create();
        $result->role = 'Counsellor';
        $result->save();
        return $result;
    }

    private function client()
    {
        $user = factory(User::class)->create();
        return $user;
    }
}