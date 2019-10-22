<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Passport;

class ManageAddressesTest extends TestCase
{
    private $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker\Factory::create();
        Passport::actingAs(
            \App\User::find(9)
        );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateSuggestedAddress()
    {
        $response = $this->json('POST', '/api/v1/addresses/suggested', [
            'neighborhood' => $this->faker->streetName(),
            'street' => $this->faker->streetAddress(),
            'name' => $this->faker->name(),
            'comments' => $this->faker->realText(191, 1)
        ]);

        $response->assertStatus(200);
    }

    public function testCreateAddressFromSuggestedAddress()
    {
        $suggestedAddress = \App\Suggested_address::first();
        $response = $this->json(
            'POST',
            '/api/v1/addresses',
            [
                'suggested_address_id' => $suggestedAddress->id,
                'neighborhood' => $suggestedAddress->neighborhood,
                'street' => $suggestedAddress->street,
                'name' => $suggestedAddress->name,
                'comments' => $suggestedAddress->comments
            ]
        );

        $response->assertStatus(200);
    }

    public function testUpdateAddress()
    {
        $address = \App\Address::first();
        $id = $address->id;
        // Testa alterando todos os dados dentro do que é correto
        $response = $this->json(
            'PUT',
            '/api/v1/addresses/' . $id,
            [
                'name' => $this->faker->name(),
            ]
        );

        $response->assertStatus(200);

        //Testa deixando nulos dados que não podem ser nulos
        $response = $this->json(
            'PUT',
            '/api/v1/addresses/' . $id,
            [
                'name' => $this->faker->name(),
                'is_valid' => null
            ]
        );

        $response->assertStatus(500);
    }

    public function testDestroyAddress()
    {
        $address = \App\Address::create(['name' => $this->faker->name()]);
        $id = $address->id;
        $response = $this->json(
            'DELETE',
            '/api/v1/addresses/' . $id
        );

        $response->assertStatus(200);
    }

    public function testGetAddress()
    {
        $response = $this->json(
            'GET',
            '/api/v1/addresses/' . \App\Address::first()->id
        );

        $response->assertJson(['data' => \App\Address::first()->toArray()]);
    }
}
