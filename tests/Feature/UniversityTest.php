<?php

namespace Tests\Feature;


use App\Models\University;
use Tests\TestCase;

class UniversityTest extends TestCase
{
    public function testCanStore()
    {
        $url = '/university';
        $data = University::factory()->raw();

        $this
            ->post($url, $data)
            ->assertCreated();

        $this->assertDatabaseHas('universities', [
            'name' => $data,
        ]);
    }
}
