<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{ 
    protected $fillable = [
    'name' , 'slug'
];

public function posts(){
    return $this-> belongsToMany('App\Model\user\post' , 'category_posts');
}
}
