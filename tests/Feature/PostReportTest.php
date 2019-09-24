<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker;
use Laravel\Passport\Passport;

class PostReportTest extends TestCase
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

    public function testReportAssignment()
    {
        $comment = $this->faker->realText(191, 1);
        $id = \App\Address::first()->id;
        $report = $this->json(
            'POST',
            '/api/v1/addresses/' . $id . '/visit',
            [
                'visit_date' => '2019/01/01',
                'comment' => $comment
            ]
        );

        $report->assertStatus(200);
        $report->assertJson([
            'data' => [
                'visit_date' => '2019-01-01',
                'comment' => $comment
            ]
        ]);
    }
}
