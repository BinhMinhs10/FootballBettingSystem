
<div class='sticky-top' >
  <nav class="navbar navbar-expand-md navbar-light" style="background-image: url({{ asset('images/menu.jpg') }}">
  <a class="navbar-brand" href="#">FBS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('matches') }}">Matches<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('teams') }}">Teams</a>
      </li>
      @if(Auth::guard('admin')->check())
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('adlogout') }}">Logout</a>
        </li>  
      @endif

      
    </ul>
  </div>
</nav>
</div>
