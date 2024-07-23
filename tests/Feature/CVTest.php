<?php

namespace Tests\Feature;


use App\Models\Person;
use App\Models\University;
use Tests\TestCase;

class CVTest extends TestCase
{
    public function testCanStore()
    {
        $url = '/cv';
        $university = University::factory()->create();
        $data1 = Person::factory()->raw();
        $data2 = [
            'university_id' => $university->id,
            'skills' => [1,2],
        ];
        $data3 = array_merge($data1, $data2);

        $this
            ->post($url, $data3)
            ->assertCreated()->dump();
    }
}
