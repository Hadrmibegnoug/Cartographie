<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Migrant extends Model
{
    public function regions(): BelongsTo
{
    return $this->belongsTo(Region::class);
}
    use HasFactory;
}
