<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use App\Models\Location;
use App\Models\Producttype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['product_name', 'category_id','location_id','producttype_id','description','status' ,'about','remarks','price','contact_num'];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function producttype(){
        return $this->belongsTo(Producttype::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
