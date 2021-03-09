<nav class="navbar navbar-expand-lg navbar-light bg-light py-0">

    <a class="navbar-brand lblRed" href="/">
      
        <img src="/img/index/mlqu_logo.png" width="45" height="45" class="d-inline-block align-center">

        Manuel L. Quezon University

    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        
      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-1 mt-lg-0" style="font-size:10pt">

        {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Schedules</a>
        </li> --}}
      
      
        <li class="nav-item">
          <a class="nav-link" href="/application">Online Application</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="/enlistment">Enlistment</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/schedule">Schedule</a>
        </li>
      
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Scholarships</a>
        </li> --}}
      
        <li class="nav-item">
          <a class="nav-link" href="#">Payment Options </a>
        </li>
      
      
      
      
        
      </ul>



        <a class="btn btn-sm m-2 text-light px-4" style="background: #7A353C; font-size: 9pt;" href="/enrollment">Enroll Now</a>

        @if(Route::current()->getName() != 'login')
          <a class="btn btnLogin btn-sm border rounded" style="border-color: #7A353C !important; font-size: 9pt;" href="/login">Login</a>
        @endif
        
    </div>

    
</nav>