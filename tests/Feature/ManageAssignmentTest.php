<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class ManageAssignmentTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = \App\User::find(9);
        Passport::actingAs(
            \App\User::find(9)
        );
    }

    public function testGetAssignments()
    {
        $response = $this->json(
            'GET',
            '/api/v1/assignments'
        );

        $response->assertStatus(200);
        // TODO: Criar código para verificar o JSON se está correto
        // $response->assertJson(
        //     [
        //         'data' =>
        //         [
        //             'assigned' => \App\Assignment::whereNull('completion_date')->first()->toArray(),
        //             'unassigned' => \App\Assignment::where('completion_date', '>', '0')->first()->toArray()
        //         ]
        //     ]
        // );
    }

    public function testCreateAssignment()
    {
        $response = $this->json(
            'POST',
            '/api/v1/assignments',
            [
                'publishers' => [$this->user->id],
                'card_id' => \App\Card::first()->id
            ]
        );

        $response->assertStatus(200);
        //TODO: Verificar retorno de JSON
        // $response->assertJson(
        //     [
        //         'data' => [
        //             'user_id' => $this->user->id,
        //             'card_id' => \App\Card::first()->id
        //         ]
        //     ]
        // );
    }

    public function testGetUserAssignments()
    {
        $id = $this->user->id;
        $response = $this->json(
            'GET',
            '/api/v1/assignments/user/' . $id
        );

        $response->assertStatus(200);
        $response->assertJson(['data' => \App\Assignment::with('card.addresses')->where('user_id', $id)->whereNull('completion_date')->first()->toArray()]);
    }

    public function testFinishAssignment()
    {
        $assignment = \App\Assignment::whereNull('completion_date')->first();
        $response = $this->json(
            'DELETE',
            '/api/v1/assignments/' . $assignment->id
        );

        $response->assertStatus(200);
        $this->assertTrue(\App\Assignment::find($assignment->id)->completion_date != null);
    }
}
