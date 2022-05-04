<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // una categoria può appertenere a piu post e faccio la relazione hasMany 
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
