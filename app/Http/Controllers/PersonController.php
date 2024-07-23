<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonStoreRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;

class PersonController extends Controller
{
    public function store(PersonStoreRequest $request)
    {
        $person = Person::create($request->validated());

        return new PersonResource($person);
    }
}
