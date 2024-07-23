<?php

namespace App\Http\Controllers;


use App\Http\Requests\CVStoreRequest;
use App\Http\Resources\CVResource;
use App\Models\CV;
use App\Models\Person;

class CVController extends Controller
{
    public function store(CVStoreRequest $request)
    {
        $newRequest = $request->validated();
        $person = Person::where('first_name', $request->validated()['first_name'])->first();

        if ($person) {
            $newRequest['person_id'] = $person->id;
        }
        else {
            $newPerson = Person::create($request->validated());
            $newRequest['person_id'] = $newPerson->id;
        }

        $cv = CV::create($newRequest);
        $cv->skills()->attach($newRequest['skills']);

        return new CVResource($cv->load('person', 'university', 'skills'));
    }
}
