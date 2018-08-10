<?php

class Topic extends Eloquent
{
    public $table = 'topic';
    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
    
}
