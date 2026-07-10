<?php

namespace App\Http\Requests\Language;

use App\Enums\LanguageProficiency;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreLanguageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', [
            \App\Models\Language::class,
            $this->route('resume'),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'proficiency_level' => [
                'required',
                'string',
                new Enum(LanguageProficiency::class),
                Rule::in(array_column(LanguageProficiency::cases(), 'value')),
            ],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}