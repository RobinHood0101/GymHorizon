<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'duration',
        'notes',
        'user_id',
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
            'user_id' => 'integer',
        ];
    }

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercise::class)
            ->withPivot(['weight', 'repetitions', 'sets'])
            ->withTimestamps();
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dayPlans(): HasMany
    {
        return $this->hasMany(DayPlan::class);
    }
}
