<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'companyName',
        'AuthorizedShares',
        'parValue',
        'businessAbout',
        'fullName',
        'countryCode',
        'phoneNumber',
        'emailAddress',
        'planStatus',
        'termination_id',
        'field_id',
        'user_id',
        'status_id',
    ];

    public function termination():BelongsTo
    {
        return $this->belongsTo(Termination::class);
    }


    public function invoice():HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function field():BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}