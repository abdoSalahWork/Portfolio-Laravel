<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function histories()
    {
       return $this->hasMany(History::class,'historyCategoryId','id')->orderBy('year', 'DESC');
    }

}
