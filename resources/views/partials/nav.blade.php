<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<a class="navbar-brand" href="{{ action('HomeController@index') }}">HelloBlog</a>
		<form class="navbar-form navbar-left" role="search" method="GET" action="{{ action('HomeController@search') }}">
			<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="搜尋文章">
			</div>
			<button type="submit" class="btn btn-default">搜尋</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
				<li>
					<a href="{{ action('UserController@getAvatar') }}" style="padding:10px 0;">
						<img src="{{ Auth::user()->getAvatarUrl() }}" style="width:30px;height:30px;" class="img-circle" />
					</a>
				</li>
				<li class="navbar-text">
					{{ Auth::user()->name }}
				</li>
				<li>
					<a href="{{ action('Auth\AuthController@logout') }}">登出</a>
				</li>
			@else
				<li>
					<a href="{{ action('Auth\AuthController@showLoginForm') }}">登入</a>
				</li>
				<li>
					<a href="{{ action('Auth\AuthController@showRegistrationForm') }}">註冊</a>
				</li>
			@endif
		</ul>
	</div>
</nav>
<div style="padding-top: 70px;"></div>