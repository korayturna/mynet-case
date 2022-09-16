<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Person;
use App\Models\Address;
use Tests\TestCase;

class AddressTest extends TestCase
{
    public function test_create_address()
    {
        $user = User::factory()->create();
 
        $this->actingAs($user);

        $person = Person::factory()->create();

        $response = $this->post(route('address.create', ['id' => $person->id]), [
            'person_id' => $person->id,
            'address' => fake()->address(),
            'post_code' => fake()->postcode(),
            'city_name' => fake()->city(),
            'country_name' => fake()->country(),
        ]);

        $response->assertStatus(200);
    }

    public function test_show_address()
    {
        $user = User::factory()->create();
 
        $this->actingAs($user);

        $person = Person::factory()->create();

        $address = Address::factory()->create([
            'person_id' => $person->id,
        ]);

        $response = $this->get(route('address.show', ['id' => $person->id]));

        $response->assertStatus(200);
    }
}
