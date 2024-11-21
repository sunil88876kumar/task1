<?php

namespace App\Models;

use Database\Factories\PhaseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Phase extends Model
{
    /** @use HasFactory<PhaseFactory> */
    use HasFactory;

    /**
     * @return BelongsToMany<Course>
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
