<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'issuing_organization' => $this->issuing_organization,
            'credential_id' => $this->credential_id,
            'credential_url' => $this->credential_url,
            'issue_date' => $this->issue_date->toDateString(),
            'expiration_date' => $this->expiration_date?->toDateString(),
            'sort_order' => $this->sort_order,
        ];
    }
}