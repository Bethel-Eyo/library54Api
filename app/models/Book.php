<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model {
    public $incrementing = false;
    protected $fillable = ['id', 'cat_id', 'book_title'];
}