<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StructureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'structureName' => $this->structureName,
            'Subtitle' => $this->Subtitle,
            'Summary' => $this->Summary,
            'terminationList' => json_decode($this->terminationList), // Convertir JSON a array
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
