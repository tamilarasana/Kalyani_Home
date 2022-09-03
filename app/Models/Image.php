<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['product_id','images'];

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
