<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    /** @use HasFactory<CourseFactory> */
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'is_purchasable',
        'is_published',
        'image',
        'rating',
        'available_from',
        'available_to'
    ];
    /**
     * @return BelongsToMany<Phase>
     */
    public function phases(): BelongsToMany
    {
        return $this->belongsToMany(Phase::class);
    }
}
