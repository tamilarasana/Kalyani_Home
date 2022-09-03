<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maplocation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['location_name', 'product_id','map_link','data','description','status'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
