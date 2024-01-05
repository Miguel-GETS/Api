<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'planName',
        'planPeriod',
        'planPrice',
        //'features',
        'feature_id',
        'planStatus',
    ];

    public function invoice():HasMany
    {
        return $this->hasMany(Invoice::class);
    }
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
