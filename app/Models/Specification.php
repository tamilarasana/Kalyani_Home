<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['spec_name', 'product_id','description','remark','spec_icon','status'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
