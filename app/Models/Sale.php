<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Sale extends Model
{
    // use Translatable;
    
    protected $table = 'sales';
    protected $guarded = [];

    // public $translatedAttributes = ['company','address','city','state','country','contact_person'];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
