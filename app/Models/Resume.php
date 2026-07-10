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
    'summary',
    'summary_generated_at',
    'data',
];

protected function casts(): array
{
    return [
        'data' => 'array',
        'summary_generated_at' => 'datetime',
    ];
}
    
    
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class)->orderBy('sort_order');
    }
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class)->orderBy('sort_order');
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class)->orderBy('sort_order');
    }  
    public function certifications(): HasMany
{
    return $this->hasMany(Certification::class)->orderBy('sort_order');
} 
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class)->orderBy('sort_order');
    }
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class)->orderBy('sort_order');
    }
    }