<?php

namespace Tests\Feature;

use App\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    public function testCanStore()
    {
        $url = '/person';
        $data = Person::factory()->raw();

        $this
            ->post($url, $data)
            ->assertCreated();

        $this->assertDatabaseHas('persons', [
            'third_name' => $data['third_name'],
        ]);
    }
}
