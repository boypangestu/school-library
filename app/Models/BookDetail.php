<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'book_id'
    ];

    public $timestamps = false;

    public function hasperm()
    {
        return $this->hasMany(Author::class, 'book_detail');
    }
}
