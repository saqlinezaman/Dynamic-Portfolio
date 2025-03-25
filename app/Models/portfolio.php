<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Category;

class portfolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortfolioFactory> */
    use HasFactory;
    protected $guarded = [''];

    public function oneCategory(){
        return $this->hasOne(portfolio::class,'id','category_id');
    }
}
