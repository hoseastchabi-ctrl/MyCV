<?php

namespace App\Http\Requests\Education;

use App\Enums\DegreeType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateEducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('education'));
    }

    public function rules(): array
    {
        return [
            'institution_name' => ['sometimes', 'required', 'string', 'max:255'],
            'degree' => ['sometimes', 'required', 'string', 'max:255'],
            'degree_type' => ['sometimes', 'required', new Enum(DegreeType::class)],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}