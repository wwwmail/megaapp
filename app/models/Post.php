<?php

class Post extends Eloquent
{
    public function topic()
    {
        return $this->belongsTo('Topic', 'topic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
    
}
