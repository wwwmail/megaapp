<?php

class SuperTopic extends Topic 
{
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
