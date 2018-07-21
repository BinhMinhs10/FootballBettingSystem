<div class='sticky-top' >
  <nav class="navbar navbar-expand-md navbar-dark" style='background-color: #4267b2; '>
  <a class="navbar-brand" href="#">FBS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('home') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home" style="font-size:24px;"></i><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{ Request::is('about') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('about') }}"><i class="fa fa-info-circle" style="font-size:24px;"></i></a>
      </li>
      <li class="nav-item {{ Request::is('contact') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('contact') }}"><i class="fa fa-comments" style="font-size:24px;"></i></a>
      </li>
      @auth
        <li class="nav-item {{ Request::is('history') ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('history') }}"><i class="fa fa-address-card" style="font-size:24px;"></i></a>
        </li>
      @endauth
      
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
    @include('inc.authen')
  </div>
</nav>
</div>


<div class="container-fluid">

  <!-- The Modal -->
  <div id="login" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-xs-center"><b>Form Sign up</b></h4>
              </div>
              <div class="modal-body">
                  <form role="form"  action="{{ route('signup') }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label class="control-label">Username</label>
                          <div>
                              <input type="text" class="form-control input-lg" name="username" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">E-Mail Address</label>
                          <div>
                              <input type="text" class="form-control input-lg" name="email" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Password</label>
                          <div>
                              <input type="password" class="form-control input-lg" name="password">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Confirm Password</label>
                          <div>
                              <input type="password" class="form-control input-lg" name="confirmpass" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          <div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember"> Remember Me
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div>
                              <a class="btn btn-link" href="">Forgot Your Password?</a>
                              <button type="submit" class="btn btn-info btn-block">Sign up</button>
                          </div>
                      </div>
                  </form>
              </div>
              
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
</div>