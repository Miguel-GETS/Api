<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $mostPopularPlanId = DB::table('invoices')
            ->select('plan_id', DB::raw('COUNT(*) as total'))
            ->groupBy('plan_id')
            ->orderByDesc('total')
            ->first();

        $isPopular = $mostPopularPlanId->plan_id === $this->id;
            
        return [
            'id' => $this->id,
            'planName' => $this->planName,
            'planPeriod' => $this->planPeriod,
            'planPrice' => $this->planPrice,
            'planDescription' => $this->planDescription,
            'popular' => $isPopular,
            'forCompInUS' => json_decode($this->feature->forCompInUS), // Convierte el JSON de features en un array
            'forEntInUS' => json_decode($this->feature->forEntInUS), // Convierte el JSON de features en un array
            'feature' => json_decode($this->feature->features), // Convierte el JSON de features en un array
            'bookingAndTaxes' => json_decode($this->feature->bookingAndTaxes), // Convierte el JSON de features en un array
            'bussinessDissolution' => json_decode($this->feature->bussinessDissolution), // Convierte el JSON de features en un array
            'ADD_ONS' => json_decode($this->feature->ADD_ONS), // Convierte el JSON de features en un array
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
