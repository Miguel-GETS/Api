<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'StatusName',
    ];

    public function company():HasMany
    {
        return $this->hasMany(Company::class);
    }
}
