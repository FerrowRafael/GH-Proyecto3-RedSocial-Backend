<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'text',
        'file',
        'user_id',
    ];
    public function user()
    {
       return $this->belongsTo('\App\User');
    }
    // public function post()
    // {
    //     return $this->belongsToMany('\App\Post');
    //  }
}
