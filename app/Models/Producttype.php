<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producttype extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'category_id','location_id','description','status'];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
