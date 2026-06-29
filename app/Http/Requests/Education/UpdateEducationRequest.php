<?php

namespace App\Http\Requests\Education;

use App\Models\Education;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        $education = $this->route('education');

        return $education instanceof Education && $education->resume->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        return [
            'institution_name' => ['sometimes', 'string', 'max:255'],
            'degree' => ['sometimes', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_date' => ['sometimes', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current' => ['sometimes', 'boolean'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}