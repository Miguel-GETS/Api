<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'stateName',
        'benefist_id',
    ];

    public function stateFee():HasMany
    {
        return $this->hasMany(StateFee::class);
    }

    public function benefist():BelongsTo
    {
        return $this->belongsTo(Benefist::class);
    }
}
