<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'businessArea',
    ];

    public function invoice():HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}