<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use App\User;

class UsersTest extends TestCase
{
    use DatabaseTransactions; //Para no afectar la base de datos (no se guardan los datos del test)
    use InteractsWithDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanSeeUserPage()
    {
        $user = factory(User::class)->create();
        $response = $this->get($user->username);

        $response->assertSee($user->name);
    }

    public function testCanLogin(){
        $user = factory(User::class)->create();

        $response = $this->post('/login',[
            'email' =>$user->email,
            'password'=>'secret',
        ]);

        $this->AssertAuthenticatedAs($user);
    }

    public function testCanFollow(){
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        $response = $this->actingAs($user)->post($other->username.'/follow');

        $this->assertDatabasehas('followers',
        [
            'user_id' => $user->id,
            'followed_id' => $other->id,
        ]);

    }
}
