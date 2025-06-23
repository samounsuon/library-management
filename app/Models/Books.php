<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    function borrow(){
        return $this->hasMany(Borrow::class);
    }
    function category(){
        return $this->belongsTo(Categories::class);
    }
    function returnBook(){
        return $this->hasMany(ReturnBook::class);
    }
    protected $fillable = ['title', 'year', 'author', 'category_id'];

}
