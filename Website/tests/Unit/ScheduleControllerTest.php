<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Schedule;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ScheduleControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function CreateCounsellor()
    {
        $result = factory(User::class)->create();
        $result->role = "Counsellor";
        $result->save();
        return $result;
    }

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

        //Ensure users with client role are redirected to home page
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get("/schedules/show");
        $response->assertLocation("/");

        //Ensure users with counsellor role are permitted access
        $user = $this->CreateCounsellor();
        $response = $this->actingAs($user)->get("/schedules/show");
        $response->assertOk();
    }

    public function test_Create()
    {

        $user = $this->CreateCounsellor();
        $response = $this->actingAs($user)->post("/schedules/create",[
            "startDate" => "2020-4-8",
            "endDate" => "2021-4-8"
        ]);
        $response->assertStatus(302);

    }

    public function test_New(){
        $user = $this->CreateCounsellor();
        $response = $this->actingAs($user)->get("/schedules/new");
        $response->assertOk();
    }

    public function test_UpdateGet()
    {
        $user = $this->CreateCounsellor();
        $schedule = factory(Schedule::class)->create();
        $schedule->CounsellorID = $user->id;

        $response = $this->actingAs($user)->get("/schedules/update?id=" . $schedule->id);
        $response->assertOk();
    }

    public function test_UpdatePost(){
        $user = $this->CreateCounsellor();
        $schedule = factory(Schedule::class)->create();
        $schedule->CounsellorID = $user->id;

        $response = $this->actingAs($user)->post("/schedules/update",
        [
            "id" => $schedule->id,
            "CounsellorID" => $user->id,
            "StartDate" => $schedule->EndDate,
            "EndDate" => $schedule->StartDate,
            "ScheduleString" => "10/10/10/10/10"
        ]);

        $response->assertLocation("/schedules/show");
    }

    public function test_Delete(){
        $user = $this->CreateCounsellor();
        $schedule = factory(Schedule::class)->create();
        
        $response = $this->actingAs($user)->get("/schedules/delete?id=" . $schedule->id);
        $response->assertLocation("/schedules/show");
    }
}
