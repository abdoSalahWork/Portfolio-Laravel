<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // public function portfolio(){
    //     return $this->belongsToMany(PortfolioItem::class,'portfolio_category_items','portfolioCategoryId','portfolioItemId');
    // }
}
