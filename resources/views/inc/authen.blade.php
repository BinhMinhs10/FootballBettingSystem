<form class="form-inline my-2 my-lg-0" action="{{ route('signin') }}" method="post" >
	@csrf
  	
  @auth
   	<h4>Xin chào {{ Auth::user()->username }}</h4>&nbsp;&nbsp;&nbsp;
   	<a class="btn btn-danger my-2 my-sm-0" type="button" href=" {{ route('logout') }} ">Log out</a>
	@endauth

	@guest
   	<input class="form-control mr-sm-2" type="text" placeholder="Username" name="username">
  	<input class="form-control mr-sm-2" type="password" placeholder="Password" name="password">
  	<button class="btn btn-success my-2 my-sm-0" type="submit">Sign in</button> &nbsp;&nbsp;
  	<button type="button" class="btn btn-secondary my-2 my-sm-0" data-toggle="modal" data-target="#login">Sign up</button>
	@endguest
  
</form>
&nbsp;&nbsp;