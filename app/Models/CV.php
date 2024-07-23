<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CV extends Model
{
    use HasFactory;

    public const TABLE = 'cvs';

    protected $table = self::TABLE;


    protected $guarded = [
        'id',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function skills(): belongsToMany
    {
        return $this->belongsToMany(Skill::class, 'cv_skill', 'cv_id', 'skill_id');
    }
}
