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
}
