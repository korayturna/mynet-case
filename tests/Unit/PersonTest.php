<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_person()
    {
        $user = User::factory()->create();
 
        $this->actingAs($user);

        $response = $this->post(route('person.create'), [
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'birthday' => date('d/m/Y', rand( strtotime("Jan 01 1900"), strtotime("Nov 01 2000"))),
        ]);

        $response->assertStatus(200);
    }

    public function test_edit_person()
    {
        $user = User::factory()->create();
 
        $this->actingAs($user);

        $person = Person::factory()->create();

        $response = $this->post(route('person.edit', ['id' => $person->id]), [
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'birthday' => date('d/m/Y', rand( strtotime("Jan 01 1900"), strtotime("Nov 01 2000"))),
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_person()
    {
        $user = User::factory()->create();
 
        $this->actingAs($user);

        $person = Person::factory()->create();

        $response = $this->get(route('person.delete', ['id' => $person->id]));

        $response->assertStatus(302);
    }

}
