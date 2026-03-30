<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoldTransaction extends Model
{
    protected $fillable = [
        'customer_name',
        'phone',
        'id_number',
        'birth_date',
        'id_version',
        'shop_name',
        'staff_name',
        'weight',
        'karat',
        'sale_price',
        'product_image',
        'user_id',
        'type'
    ];
}
