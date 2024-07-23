<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillStoreRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;

class SkillController extends Controller
{
    public function store(SkillStoreRequest $request)
    {
        $skill = Skill::create($request->validated());

        return new SkillResource($skill);
    }
}
