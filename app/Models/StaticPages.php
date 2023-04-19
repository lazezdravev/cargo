<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    use HasFactory;

    protected $table = 'static_pages';

    protected $fillable = [
        'title',
        'image',
        'slug',
        'description',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
