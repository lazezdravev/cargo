<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicants extends Model
{
    use HasFactory;

    protected $table = 'job_applicants';

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'city',
        'state',
        'job_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
