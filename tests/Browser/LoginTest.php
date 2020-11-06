<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /** 
     * @test
     */
    public function registered_users_can_login()
    {
        factory(User::class)->create([
            'email' => 'marta_romeu@hotmail.com'
        ]);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email' , 'marta_romeu@hotmail.com')
                    ->type('password','secret')
                    ->press('#login-btn')             
                    ->assertAuthenticated()
                    ;
        });
    }
}
