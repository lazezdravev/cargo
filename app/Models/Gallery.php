<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'image',
        'cat_id',
        'front_page'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'cat_id');
    }

}
