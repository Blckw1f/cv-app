<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversityStoreRequest;
use App\Http\Resources\UniversityResource;
use App\Models\University;

class UniversityController extends Controller
{
    public function store(UniversityStoreRequest $request)
    {
        $university = University::create($request->validated());

        return new UniversityResource($university);
    }
}
