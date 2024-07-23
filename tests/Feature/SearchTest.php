<?php

namespace Tests\Feature;


use App\Models\Person;
use App\Models\University;
use Tests\TestCase;

class SearchTest extends TestCase
{
    public function testCanSearch()
    {
        $url = '/cv';
        $university = University::factory()->create();
        $data1 = Person::factory()->raw();
        $data2 = [
            'university_id' => $university->id,
            'skills' => [1,2],
        ];
        $data3 = array_merge($data1, $data2);
        $data3['birth_date'] = '2024-05-05';

        $this
            ->post($url, $data3)
            ->assertCreated();

        $url = '/search';
        $data = [
            'start_date' => '2024-04-05',
            'end_date' => '2024-06-05',
        ];

        $this
            ->post($url, $data)
            ->assertOk();
    }
}
