<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'birthday', 'description', 'avatar', 'email'];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
