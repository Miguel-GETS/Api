<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StateFee extends Model
{
    use HasFactory;
    protected $fillable = [
        'state_id',
        'structure_id',
        'feeStatus',
    ];

    public function invoice():HasMany
    {
        return $this->hasMany(Invoice::class);
    }
    
    public function state():BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function structure():BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }
}
