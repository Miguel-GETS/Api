<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'companyName' => $this->companyName,
            'parValue' => $this->parValue ?? null,
            'StatusName' => $this->status['StatusName'] ?? null,
            'AuthorizedShares' => $this->AuthorizedShares ?? null, // Usar null coalescing para manejar null
            'businessArea' => $this->field['businessArea']?? null,
            'businessAbout' => $this->businessAbout,
            'fullName' => $this->fullName,
            'countryCode' => $this->countryCode,
            'phoneNumber' => $this->phoneNumber,
            'emailAddress' => $this->emailAddress,
            'terminationName' => $this->termination['terminationName'] ?? null, // Usar null coalescing para manejar null
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
