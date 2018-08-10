<?php

namespace MegaApp\Repository\ForumRepository;

use Topic;

class ForumRepository implements ForumRepositoryInterface
{


    public function getTopicsList()
    {
        return Topic::all();      
    }

    public function setUser($user)
    {
        $this->user = $user; 
    }



}
