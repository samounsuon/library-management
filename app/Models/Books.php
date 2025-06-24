<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    // ✅ Allow mass assignment for these fields
    // protected $fillable = ['title', 'year', 'author', 'category_id'];

    // 📚 A book belongs to one category
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    // 📖 A book can be borrowed many times
    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }

    // 🔁 A book can be returned many times
    public function returnBook()
    {
        return $this->hasMany(ReturnBook::class);
    }
    protected $fillable = ['title', 'year', 'author', 'category_id'];

}
