<?php

use MegaApp\Repository\ForumRepository\ForumRepositoryInterface;

class ForumController extends BaseController
{

    protected $topic;
    protected $post;


    /*public function __construct ($topic, $post)
    {
        $this->topic = $topic;
        $this->post = $post;
    } */
    protected $forumRepo;
    public function __construct( ForumRepositoryInterface $repo)
    {
        $this->beforeFilter('auth',array('except'=> 'getTopicsList'));
        $this->forumRepo = $repo;

        $this->forumRepo-> setUser (Auth::id());
    }



    public function getTopicsList()
    {
      // $topics = new ForumRepository;

        $topics = $this->forumRepo->getTopicsList();

        return View::make('forum.list', ['topics'=>$topics]);
    }


    public function postNewTopic()
    {
        $title = Input::get('title');
       // $msg = Input::get('message');
        $userId = Auth::id();

        $validator = Validator::make(['title'=> $title], 
            ['title'=> 'required|min:5']
        );

    if($validator->fails()){
    
    return Redirect::action('ForumController@getTopicsList')->withErrors($validator);
    }else{
    
    
    }

        $topic = new Topic;
        $topic->title = $title;
        $topic->user_id = $userId;
        $topic->save();

        return Redirect::action('ForumController@getTopicsList');
    }


    public function getTopic($id)
    {
      //  echo $id; die('some id');
        $topic = Topic::find($id);
        $topic->visits++;
        $topic->save();

        $posts = $topic->posts;

        return View::make('forum.topic',['topic'=>$topic, 'posts'=>$posts]);
    }

    public function postNewPost($id)
    {
       // echo $id; die;
        $topic = Topic::find($id);

        $topic->posts_count++;
        $topic->save();

        $post = new Post();
        $msg = Input::get('message');

        $userId = Auth::id();

        $post->message = $msg;
        $post->user_id  = $userId;
        $post->topic_id = $topic->id;
        $post->save();

        return Redirect::action('ForumController@getTopic', $topic->id);

       
    
    
    }
}
