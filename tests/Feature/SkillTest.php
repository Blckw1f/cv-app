<?php

namespace Tests\Feature;

use App\Models\Skill;
use Tests\TestCase;

class SkillTest extends TestCase
{
    public function testCanStore()
    {
        $url = '/skill';
        $data = Skill::factory()->raw();

        $this
            ->post($url, $data)
            ->assertCreated();

        $this->assertDatabaseHas('skills', [
            'name' => $data,
        ]);
    }
}
