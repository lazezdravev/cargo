<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =  [
        'title',
        'slug',
        'file',
        'file_name',
        'image',
        'category',
        'description',
        'user_id',
        'created_at',
        'updated_at'
    ];



    public function cat()
    {
        return $this->belongsTo(Categories::class,'category');
    }

    public function images()
    {
        return $this->hasMany(Sliders::class,'product_id','id');
    }
}
