<?php

namespace App\Http\Requests\Resume;

use App\Models\Resume;
use Illuminate\Foundation\Http\FormRequest;

class GenerateResumeRequest extends FormRequest
{
    public function authorize(): bool
    {
        $resume = $this->route('resume');

        return $resume instanceof Resume
            && $resume->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        return [];
    }
}