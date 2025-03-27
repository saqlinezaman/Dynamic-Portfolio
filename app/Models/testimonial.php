<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory;
    protected $guarded=[''];
    public function oneCatFortestimonial(){
        return $this -> hasOne(testimonial::class,'testimonial_id','id');
    }
}
