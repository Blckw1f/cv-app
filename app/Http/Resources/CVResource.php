<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CVResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'person' => new PersonResource($this->whenLoaded('person')),
            'university' => new UniversityResource($this->whenLoaded('university')),
            'skills' => SkillResource::collection($this->whenLoaded('skills')),
        ];
    }
}
