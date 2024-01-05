<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateFeeResource extends JsonResource
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
            'state' => [
                'id' => $this->state['id'],
                'stateName' => $this->state['stateName'],
            ],
            'structure' => [
                'id' => $this->structure['id'],
                'structureName' => $this->structure['structureName'],
                'Subtitle' => $this->structure['Subtitle'],
                'Summary' => $this->structure['Summary'],
            ],
            'feePrice' => $this->feePrice,
            'feeStatus' => $this->feeStatus,
        ];
    }
}
