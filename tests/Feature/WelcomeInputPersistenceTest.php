<?php

namespace Tests\Feature;

use Database\Seeders\CriteriaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WelcomeInputPersistenceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(CriteriaSeeder::class);
    }

    public function test_welcome_page_receives_saved_session_inputs(): void
    {
        $payload = [
            'alternatives' => [
                [
                    'name' => 'Gusion Cosmic Gleam',
                    'scores' => [1 => 1089, 2 => 4],
                ],
            ],
        ];

        $this->withSession(['welcome_inputs' => $payload])
            ->get('/')
            ->assertOk()
            ->assertSee('data-saved-inputs=', false)
            ->assertSee('Gusion Cosmic Gleam', false);
    }

    public function test_welcome_inputs_are_stored_in_session(): void
    {
        $payload = [
            'alternatives' => [
                [
                    'name' => 'Skin Pertama',
                    'scores' => [1 => 1000, 2 => 5],
                ],
                [
                    'name' => 'Skin Kedua',
                    'scores' => [1 => 2000, 2 => 4],
                ],
            ],
        ];

        $this->postJson('/skin-inputs', $payload)
            ->assertNoContent()
            ->assertSessionHas('welcome_inputs.alternatives.0.name', 'Skin Pertama')
            ->assertSessionHas('welcome_inputs.alternatives.1.scores.1', 2000);
    }

    public function test_welcome_inputs_can_be_cleared_from_session(): void
    {
        $this->withSession([
            'welcome_inputs' => [
                'alternatives' => [
                    ['name' => 'Skin Dihapus', 'scores' => [1 => 1000]],
                ],
            ],
        ])->deleteJson('/skin-inputs')
            ->assertOk()
            ->assertSessionMissing('welcome_inputs');
    }
}
