<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bonus extends Model
{
    use HasFactory;
    protected $fillable = [
        'bonoName',
        'bonosCode',
        'bonosDescriptions',
        
    ];

    public function invoice():HasMany
    {
        return $this->hasMany(Invoice::class);
    }

}
