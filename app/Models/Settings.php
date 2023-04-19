<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = ['title', 'mainurl', 'email','link','address',
        'logo', 'logomedium', 'logothumb', 'description', 'user_id', 'workflow_id', 'created_at', 'updated_at',
        'phone','twitter','facebook','linkedin','gplus','youtube','flickr','skype','lat','lng', 'instagram', 'logo_white',
        'meta_image'
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function createdby()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
