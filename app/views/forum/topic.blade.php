@extends('layout.main')

@section('content')

<h1>{{$topic->title}}</h1>

@foreach($posts as $post)

<div class="post">
    <div class="post-head">
    <p>
        <span class="author">{{$post->user->nickname}}</span>
        <span class="ts">{{$post->created_at}}</span>
    </p>

<div class="post-body">
<p>{{$post->message}}</p>
</div>
    </div>

</div>

@endforeach
{{$topic->id}}
<form method="post" action="{{URL::action('ForumController@postNewPost', $topic->id)}}">

<input type="text" name="message">

<input type="submit" value="send">
</form>

@stop
