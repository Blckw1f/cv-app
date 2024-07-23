<?php

namespace Database\Seeders;

use App\Models\CV;
use App\Models\Person;
use App\Models\Skill;
use App\Models\University;
use Illuminate\Database\Seeder;

class CVSeeder extends Seeder
{
    public function run(): void
    {
        $person = Person::factory()->create();
        $university = University::factory()->create();
        $skill = Skill::factory()->create();
        $cv = CV::factory()->create([
            'person_id' => $person->id,
            'university_id' => $university->id,
        ]);
        $cv->skills()->attach($skill->id);
    }
}
