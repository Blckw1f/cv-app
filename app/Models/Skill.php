<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function cvs(): belongsToMany
    {
        return $this->belongsToMany(CV::class, 'cv_skill', 'skill_id', 'cv_id');
    }
}
