@extends('layout.main')
@section('content')

@if(isset($error))
</p>{{$error}}</p>
@endif
<form method="post" action="">
<input name="email" type="text">
<input name="password" type="password">
<input type="submit" name="submit" value="login">
</form>

@stop
