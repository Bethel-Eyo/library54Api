<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cat extends Model {
    public $incrementing = false;
    protected $fillable = ['id', 'name'];
}