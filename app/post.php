<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class post extends Model
{
    protected $fillable = [
        'title' , 'subtitle' , 'content', 'slug', 'image',
    ];

    public function tags(){
        return $this-> belongsToMany('App\tag' , 'post_tags');
    }

    public function categories(){
        return $this-> belongsToMany('App\category' , 'category_posts');
    }
    public function getRouteKeyName(){
        return 'id' ;
    }  
    use Commentable;
 }
