<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResoruce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Obtener el precio del plan y el precio de la tarifa estatal
        $planPrice = floatval($this->plan['planPrice']);
        $feePrice = floatval($this->state_fee['feePrice']);
        $benefistPrice = floatval($this->state_fee['state']['benefist']['benefistPrice'] ?? 0.00);


        // Calcular el subtotal como la suma de los precios
        $subtotal = $planPrice + $feePrice + $benefistPrice;
        return [
            'id' => $this->id,
            'total' => number_format($subtotal, 2),
            'totalPayed' => $this->total,

            'holderName' => $this->holderName,
            'holderLastName' => $this->holderLastName,
            'holderEmail' => $this->holderEmail,
            'documentType' => $this->document_type['documentType'],
            'holderDocument' => $this->holderDocument,

            'plan_start_date' => $this->plan_start_date,
            'plan_end_date' => $this->plan_end_date,

            'company' => [
                'id' => $this->company['id'],
                'companyName' => $this->company['companyName'],
                'parValue' => $this->company['parValue'] ?? null,
                'AuthorizedShares' => $this->company['AuthorizedShares']?? null,
                
                'businessArea' => $this->company['field']['businessArea']?? null,
                'businessAbout' => $this->company['businessAbout'],
                'fullName' => $this->company['fullName'],
                'countryCode' => $this->company['countryCode'],
                'phoneNumber' => $this->company['phoneNumber'],
                'emailAddress' => $this->company['emailAddress'],
                'terminationName' => $this->company['termination']['terminationName'],
            ],
            'plan' => [
                'planName' => $this->plan['planName'],
                'planPeriod' => $this->plan['planPeriod'],
                'planPrice' => $this->plan['planPrice'],
                'planFeatures' => json_decode($this->plan['feature']['features']),
            ],
            'state_fee' => [
                'feePrice' => $this->state_fee['feePrice'],
                'structure' => [
                    'structureName' => $this->state_fee['structure']['structureName'],
                ],
                'state' => [
                    'stateName' => $this->state_fee['state']['stateName'],
                    'benefistName' => $this->state_fee['state']['benefist']['benefistName'] ?? null,
                    'benefistPrice' => $this->state_fee['state']['benefist']['benefistPrice'] ?? null,

                ],
                // 'termination' => [
                //     'terminationName' => $this->company['termination']['terminationName'],
                // ],
            ],
            'bonus' => $this->bonus ? [
                'bonusName' => $this->bonus['planName'],
                'bonusCode' => $this->bonus['planName'],
                'bonusDescriptions' => $this->bonus['planName'],
            ]: null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
