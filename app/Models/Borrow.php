<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    function member(){
        return $this->belongsTo(Members::class);
    }
    function book(){
        return $this->belongsTo(Books::class);
    }
}
