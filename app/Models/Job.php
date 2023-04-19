<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'image',
        'option',
        'experience',
        'equipment',
        'salary',
        'description',
        'place'
    ];


    public function applicants()
    {
        return $this->hasMany(JobApplicants::class);
    }

    public static function search($search)
    {
        $query = self::query();
        $columns = ['title', 'place', 'description', 'experience', 'salary', 'option', 'type']; // here add more columns
        foreach ($columns as $column) {
            $query->orWhere( $column, 'like', "%{$search}%");
        }
        return $query->get();
    }
}
