<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise_name',
        'description',
        'weight',
        'repetitions',
        'sets',
        'place',
        'exercise_category_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'exercise_category_id' => 'integer',
        ];
    }

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }

    public function exerciseCategory(): BelongsTo
    {
        return $this->belongsTo(ExerciseCategory::class);
    }
}
