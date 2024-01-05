<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefist extends Model
{
    use HasFactory;
    protected $fillable = [
        'benefistName',
        'benefistPrice',
        'benefistStatus',
    ];

    public function state(){
        return $this->hasMany(State::class);
    }
}
