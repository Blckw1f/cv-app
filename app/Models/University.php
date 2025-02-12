<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function cvs(): HasMany
    {
        return $this->hasMany(CV::class);
    }
}
