<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Customer extends Model
{
    // use Translatable;
    
    protected $table = 'customers';
    protected $guarded = [];

    // public $translatedAttributes = ['company','address','city','state','country','contact_person'];
    use HasFactory;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

}
