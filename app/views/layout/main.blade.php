<html>
<head>
</head>

<body>
<div class="header">
@if(Auth::check())
Hello, {{Auth::user()->nickname}}
<a href="{{URL::action('AuthController@getLogout')}}">Logout</a>
@else
<a href="{{URL::action('AuthController@getLoginForm')}}">log in</a>
<a href="{{URL::action('AuthController@getRegisterForm')}}">Register in</a>
@endif

</div>
<div class="content">
@yield('content');
</div>
</body>
</html>
