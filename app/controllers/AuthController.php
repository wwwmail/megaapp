<?php

class AuthController extends BaseController {
    
    public function getRegisterForm()
    {
        return View::make('auth.registerform');
    }

    public function getLoginForm()
    {  
        return View::make('auth.loginform');
    }

    public function postRegisterForm()
    {
        $email = Input::get('email');
        $pass = Input::get('password');
        $nick = Input::get('nick');

        $validator = Validator::make(
            Input::all(),
            [
                'nick'=> 'required|min:3|alpha_num',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]

           /* [
                'required' => 'Please enter :attribute',
                'nickname.required' => ' Nick name should be specified'
            ]*/
        );

        if($validator->fails()){
        
            return Redirect::action('AuthController@getRegisterForm')->withErrors($validator);
        }

        $user = new User;
        $user->email = $email;
        $user->password = Hash::make($pass);
        $user->nickname = $nick;
        $user->save();

        return Redirect::action('AuthController@getLoginForm');
    }

    public function postLoginForm()
    {
        $email = Input::get('email');
        $pass = Input::get('password');

        if(Auth::attempt(array('email'=>$email, 'password'=>$pass))){

            return Redirect::to('/');
        
        }else{
            
            return View::make('auth.loginform', ['error' => 'Invalid login/pass']);
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/');
    }


    public function getPosts($id)
    {
        $topic = Topic::find($id);
        $posts = $topic->posts;

        return View::make('forum.topic', ['topic' => $topic, 'posts'=>$posts]);
    }
}
