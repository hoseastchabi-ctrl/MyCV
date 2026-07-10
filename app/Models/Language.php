<?php

namespace App\Models;

use App\Enums\LanguageProficiency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Language extends Model
{
    protected $fillable = [
        'resume_id',
        'name',
        'proficiency_level',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'proficiency_level' => LanguageProficiency::class,
            'sort_order' => 'integer',
        ];
    }

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}