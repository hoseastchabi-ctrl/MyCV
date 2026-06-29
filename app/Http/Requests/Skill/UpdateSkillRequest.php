<?php

namespace App\Http\Requests\Skill;

use App\Enums\SkillLevel;
use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        $skill = $this->route('skill');

        return $skill instanceof Skill && $skill->resume->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'level' => ['nullable', new Enum(SkillLevel::class)],
            'sort_order' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}