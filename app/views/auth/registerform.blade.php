@extends('layout.main')
@section('content')





<form method="post" action="">
<input name="email" type="text">
{{$errors->first('email')}}
<input name="nick" type="text">
{{$errors->first('nickname')}}

<input name="password" type="password">
{{$errors->first('password')}}

<input type="submit"  name="submit" value="register">

</form>

@stop
