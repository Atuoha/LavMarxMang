<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    //

    protected $fillable = ['name', 'url', 'description','user_id'];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
