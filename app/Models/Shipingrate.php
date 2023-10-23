<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipingrate extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relations

    public function products()
    {
        return $this->hasMany(Product::class, 'shipping_id');
    }
}
