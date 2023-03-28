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

    public function category()
    {
        return $this->belongsTo('App\CategoryModel','category_id','id');
    }
    public function main_category()
    {
        return $this->belongsTo('App\CategoryMainModel','main_cat_id','id');
    }

}
