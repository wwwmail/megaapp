@extends('layout.main');

@section('content')
<a href="{{URL::action('ForumController@getTopicsList')}}">get list</a>
<h1>Forums list</h1>

@foreach($topics as $topic)
<div>
<p class="topiclatter">><b>{{$topic->user->nickname}}</b>  <i>{{$topic->updated_at}}</i></p>
<p><a href="{{URL::action('ForumController@getTopic', $topic->id)}}">{{$topic->title}}</a></p>
<p>Posts : {{$topic->posts_count}} Visits: {{$topic->visits}}
</div>

@endforeach

<h2>Start new topic</h2>
@if(Auth::check())
<form method="post" action = "{{URL::action('ForumController@postNewTopic', $topic->id)}}">
<input type="text" name="title">

{{$errors->first('title')}}
<input type="submit" value="start">
</form>
@endif
@stop

