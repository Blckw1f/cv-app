<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    public const TABLE = 'persons';

    protected $table = self::TABLE;

    protected $guarded = [
        'id',
    ];

    public function cvs(): HasMany
    {
        return $this->hasMany(CV::class);
    }
}
