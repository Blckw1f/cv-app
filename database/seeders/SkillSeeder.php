<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{

    public function run(): void
    {
        Skill::factory()->count(5)->create();
    }
}
