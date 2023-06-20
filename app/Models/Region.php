<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    public function migrants(): HasMany
{
    return $this->hasMany(Migrant::class);
}
    use HasFactory;
}
