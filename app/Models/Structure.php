<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Structure extends Model
{
    use HasFactory;
    protected $fillable = [
        'structureName',
        'terminationList',
    ];

    public function stateFee():HasMany
    {
        return $this->hasMany(StateFee::class);
    }
}
