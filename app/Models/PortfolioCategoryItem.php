<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategoryItem extends Model
{
    use HasFactory;
    protected $fillable = ['portfolioCategoryId','portfolioItemId'];
    public function category(){
        return $this->belongsTo(PortfolioCategory::class, 'portfolioCategoryId', 'id')->select('id', 'name');

        // return $this->hasMany(PortfolioCategory::class,'portfolioCategoryId','id');
    }
    // public function category(){
    //     return $this->belongsToMany(PortfolioCategory::class,'portfolioCategoryId','id');
    // }
    // public function item(){
    //     return $this->belongsToMany(PortfolioItem::class,'portfolioItemId','id');
    // }
}
