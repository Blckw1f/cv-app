<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\Person;
use App\Models\University;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class PersonTest extends TestCase
{
    public function testHasManyCV()
    {
        $person = Person::factory()->create();
        $university = University::factory()->create();
        $cv = CV::factory()->create([
            'person_id' => $person->id,
            'university_id' => $university->id,
        ]);
        $this->assertInstanceOf(Collection::class, $person->cvs);
        $this->assertTrue($person->cvs->contains($cv));
    }
}
