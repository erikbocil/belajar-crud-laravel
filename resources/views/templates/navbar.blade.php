<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('book')}}"><img src="https://c.tenor.com/woY-G8ICu-UAAAAC/kobo-kanaeru-hai.gif" alt="kobo" width="200px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{Request::is('book') ? 'active' : '' }}" aria-current="page" href="{{ url('book')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('book/create') ? 'active' : '' }}" href="{{url('book/create')}}">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('booak') ? 'active' : '' }}" href="">Pricing</a>
          </li>
          <li class="nav-item">
            @if (Session::has('loginId'))
          
              <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">logout</a> 
    
            @else    
            <a class="nav-link" href="{{route('login-page')}}">Login</a>
            @endif
          </li>
        </ul>
    </div> 
  <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
</div>
</nav>