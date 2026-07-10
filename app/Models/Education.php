<?php

namespace App\Models;

use App\Enums\DegreeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'resume_id',
        'institution_name',
        'degree',
        'degree_type',
        'field_of_study',
        'start_date',
        'end_date',
        'description',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'degree_type' => DegreeType::class,
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}