<?php

namespace App\Models;

use App\Models\Discount;
use App\Models\Shipingrate;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model
{
    // use Translatable;
    
    protected $table = 'products';
    protected $guarded = [];
    use HasFactory;

    // Relations
    public function products()
    {
        return $this->belongsTo(Discount::class,'discount_id');
    }


    public function shipping()
    {
        return $this->belongsTo(Shipingrate::class,'shipping_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

}
