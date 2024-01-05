<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'payMethod',
        
        'holderName',
        'holderLastName',
        'holderEmail',
        'holderDocument',

        'document_type_id',
        'company_id',
        'plan_id',
        'state_fee_id',
        'bonus_id',
        'payment_id',
        
        'plan_start_date',
        'plan_end_date',
    ];
    
    public function document_type():BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }


    
    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function plan():BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function state_fee():BelongsTo
    {
        return $this->belongsTo(StateFee::class);
    }

    public function bonus():BelongsTo
    {
        return $this->belongsTo(Bonus::class);
    }

    public function field():BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
    
}
