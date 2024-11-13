<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    protected $fillable = [
        'name',
        'description',
        'value',
        'photo',
        'category_id',
        'active'
    ];
}
