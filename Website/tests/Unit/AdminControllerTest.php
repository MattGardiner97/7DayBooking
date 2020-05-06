<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\User;
use App\Http\AdminController;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use DatabaseMigrations;

  
    /**
     * Creates an Admin user
     * tests if s
     */
    public function CreateAdmin()
    {
        $result = factory(User::class)->create();
        $result->role = "Admin";
        
        $this->assertTrue($result->save(), "Couldn't create Admin member");
      
        
        return $result;
    }

    /**
     * Creates a Client with requested Counsellor privs
     */
    public function ClientRequestCounsellor()
    {
        $result = factory(User::class)->create();
        $result->requested_verification = 1;
        
        $this->assertTrue($result->save(), "Couldn't create client");

        return $result;
    }

    /**
     * Test access privis for users before and after authentication as Admin
     */
    public function test_Show()
    {
        $user = $this->CreateAdmin();
        //test portions of the site that is protected from Admin view (everything bar admins)
        $response = $this->actingAs($user)->get('/schedules/show');
        $response->assertLocation('/');

        $response = $this->actingAs($user)->get('/schedules/new');
        $response->assertLocation('/');

        $response = $this->actingAs($user)->get('/users/profile');
        $response->assertOk();

        //can't see biography data
        $response->assertDontSeeText('biography');


    }

    /**
     * Test whether client who has requested to be a Counsellor has been shown
     */
    public function test_Verify()
    {
        $userAdmin = $this->CreateAdmin();
        $userClient = $this->ClientRequestCounsellor();

        
        //test to see whether can navigate to /admin page
        $response = $this->actingAs($userAdmin)->get('/admin');
        $response->assertOk();

        $response = $this->actingAs($userAdmin)->get('/admin/verify');
        $response->assertOk();
        $response->assertSee('1', 'users');

        $response = $this->actingAs($userAdmin)->post('/admin/verify', ['id' => $userClient->id]);
        //can't test this as no return value, but can test get to see if count --
        $response = $this->actingAs($userAdmin)->get('/admin/verify');
        $response->assertSee('0', 'users');
        //$response->assertEquals($userClient->id, $response['id']);
        //$response->();

    }
}
