<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'institution_name' => $this->institution_name,
            'degree' => $this->degree,
            'degree_type' => $this->degree_type->value,
            'field_of_study' => $this->field_of_study,
            'start_date' => $this->start_date->toDateString(),
            'end_date' => $this->end_date?->toDateString(),
            'description' => $this->description,
            'sort_order' => $this->sort_order,
        ];
    }
}