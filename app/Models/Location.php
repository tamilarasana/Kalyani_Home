<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'category_id','about_location','remarks','status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
