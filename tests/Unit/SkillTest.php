<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\Person;
use App\Models\Skill;
use App\Models\University;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class SkillTest extends TestCase
{
    public function testBelongsToManyCV()
    {
        $person = Person::factory()->create();
        $university = University::factory()->create();
        $skill = Skill::factory()->create();
        $cv = CV::factory()->create([
            'person_id' => $person->id,
            'university_id' => $university->id,
        ]);
        $cv->skills()->attach($skill->id);
        $this->assertInstanceOf(Collection::class, $skill->cvs);
        $this->assertTrue($skill->cvs->contains($cv));
    }
}
