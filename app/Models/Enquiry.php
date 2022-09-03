<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = ['name', 'email','phone','product_id','message','remarks'];

}
