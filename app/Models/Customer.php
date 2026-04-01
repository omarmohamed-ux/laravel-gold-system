<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'id_number',
        'id_version',
        'phone',
        'birth_date'
    ];
    public function transactions()
{
    return $this->hasMany(GoldTransaction::class);
}
}
