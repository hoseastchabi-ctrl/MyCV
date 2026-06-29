<?php

namespace App\Http\Requests\Skill;

use App\Enums\SkillLevel;
use App\Models\Resume;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        $resume = $this->route('resume');

        return $resume instanceof Resume && $resume->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'level' => ['nullable', new Enum(SkillLevel::class)],
            'sort_order' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}