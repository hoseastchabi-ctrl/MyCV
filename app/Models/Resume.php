<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Experience;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class)->orderBy('sort_order');
    }
    public function educations(): HasMany
{
    return $this->hasMany(Education::class)->orderBy('sort_order');
}
public function skills(): HasMany
{
    return $this->hasMany(Skill::class)->orderBy('sort_order');
}
}