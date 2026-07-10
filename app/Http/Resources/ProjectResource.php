<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'description' => $this->description,
            'url' => $this->url,
            'repository_url' => $this->repository_url,
            'technologies' => $this->technologies ?? [],
            'start_date' => $this->start_date?->toDateString(),
            'end_date' => $this->end_date?->toDateString(),
            'sort_order' => $this->sort_order,
        ];
    }
}