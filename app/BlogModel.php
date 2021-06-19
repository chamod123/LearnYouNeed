<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog';

    public function user()
    {
        return $this->belongsTo('App\UserModel','user_id','id');
    }

}
