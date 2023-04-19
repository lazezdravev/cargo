<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Query;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'image',
        'tags',
        'slug',
        'description',
        'user_id',
        'meta_title',
        'keywords',
        'meta_description',
        'author',
        'created_at',
        'updated_at'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function search($search)
    {
        $query = self::query();
        $columns = ['title', 'meta_description', 'description']; // here add more columns
        foreach ($columns as $column) {
            $query->orWhere( $column, 'like', "%{$search}%");
        }
        return $query->get();
    }
}
