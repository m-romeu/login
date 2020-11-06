<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest_ extends TestCase
{
    use RefreshDatabase;
    /**   
     * @test
     */
    public function guests_users_cant_create_statuses()
    {
      
        $response = $this->post(route('statuses.store'),['body' =>'initial status']);
        
        $response->assertRedirect('login');
    }
    /**   
     * @test
     */
    
    public function an_authenticated_user_can_create_statuses()
    {
       $this->withoutExceptionHandling();
        //1.Given
       $user = factory(User::class)->create();
       $this->actingAs($user);

       //2.When
        $response = $this->postJson(route('statuses.store'),['body' =>'initial status']);
        $response->assertJson([
            'body' => 'initial status'
        ]);

       //3.Then
       $this->assertDatabaseHas('statuses',[
           'body' => 'initial status',
           'user_id' =>$user->id
           
           ]);
    }
     /**   
     * @test
     */
    
    public function a_status_requires_a_body()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->postJson(route('statuses.store'),['body' =>'']);      
        $response->assertJsonStructure([
            'message'
            ]);
    }
      /**   
     * @test
     */
    
    public function a_status_body_requires_a_minimum_length()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->postJson(route('statuses.store'),['body' =>'asdf']); 
       
        $response->assertJsonStructure([
            'message'
            ]);
    }
}
