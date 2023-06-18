<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    protected $primaryKey = "food_id";

    protected $fillable = [
        "food_picture",
        "food_name",
        "food_description",
        "food_price",
        "food_quantity"
    ];

    public function cart(){  
        return $this->hasMany(Cart::class);
    }
}
