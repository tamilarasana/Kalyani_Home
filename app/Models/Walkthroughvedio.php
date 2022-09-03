<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Walkthroughvedio extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['name', 'product_id','file','position','description','status'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
