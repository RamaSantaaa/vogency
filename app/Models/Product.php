<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['item_purchased', 'category', 'season', 'gender', 'price'];
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'product_id');
    }
}

