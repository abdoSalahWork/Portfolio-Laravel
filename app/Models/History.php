<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['name','year','slug','description','status','historyCategoryId'];

    public function category(){
        return $this->belongsTo(HistoryCategory::class,'historyCategoryId','id');
    }

}
