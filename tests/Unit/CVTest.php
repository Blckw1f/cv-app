<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\Person;
use App\Models\Skill;
use App\Models\University;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class CVTest extends TestCase
{
    public function testBelongsToPerson()
    {
        $person = Person::factory()->create();
        $university = University::factory()->create();

        $cv = CV::factory()->create([
            'person_id' => $person->id,
            'university_id' => $university->id,
        ]);
        $this->assertInstanceOf(Person::class, $cv->person);
        $this->assertTrue($cv->person->is($person));
    }

    public function testBelongsToUniversity()
    {
        $person = Person::factory()->create();
        $university = University::factory()->create();

        $cv = CV::factory()->create([
            'person_id' => $person->id,
            'university_id' => $university->id,
        ]);
        $this->assertInstanceOf(University::class, $cv->university);
        $this->assertTrue($cv->university->is($university));
    }

    public function testBelongsToManySkills()
    {
        $person = Person::factory()->create();
        $university = University::factory()->create();
        $skill = Skill::factory()->create();
        $cv = CV::factory()->create([
            'person_id' => $person->id,
            'university_id' => $university->id,
        ]);
        $cv->skills()->attach($skill->id);
        $this->assertInstanceOf(Collection::class, $cv->skills);
        $this->assertTrue($cv->skills->contains($skill));
    }
}
