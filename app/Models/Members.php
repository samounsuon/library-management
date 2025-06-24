<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    function role(){
        return $this->hasOne(Role::class);
    }
    function register(){
        return $this->hasOne(Register::class);
    }
    function borrow(){
        return $this->hasMany(Borrow::class);
    }
    function getcreatedAttribute($value){
        return date(('d/m/y'), strtotime($value));
    }
     protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
      
    ];
}
