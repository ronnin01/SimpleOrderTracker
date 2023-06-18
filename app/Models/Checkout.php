<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "food_id",
        "total_price",
        "total_quantity",
        "food_quantity",
        "checkout_status",
    ];
}
