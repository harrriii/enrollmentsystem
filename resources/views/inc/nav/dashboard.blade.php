<nav class="navbar  sticky-top flex-md-nowrap p-0 bg-lazy-color-dark" >

  <a class="navbar-brand p-2 col-md-3 col-lg-2 mr-0 px-3 text-white" style="font-size:20pt;" href="/dashboard">
      
    <img class="rounded-circle bg-white" src="/img/index/Lazydevs_logo.png" width="55" height="50" class="d-inline-block align-center">

    <label class="ml-2 pt-2"> Lazy Developers</label>
   

  </a>

  <button class="navbar-toggler btn position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">

    <i class="navbar-toggler-icon" data-feather="menu"></i>

  </button>

  <div class="d-none d-lg-block">

    <div class="d-flex flex-row-reverse bd-highlight ">

      <div class="p-2 bd-highlight">

        <div class="btn-group">

          <a class="d-none d-lg-block" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
            <img src="{{asset("uploaded/img/applicant_1.jpg")}}" alt="" class="" width="34" height="34" style="border-radius:20px;" >
          
          </a>

          <div class="dropdown-menu dropdown-menu-right">
          
            <h6 class="dropdown-header font-weight-bold">{{$name}}</h6>

            <div class="dropdown-divider"></div>

            <button class="dropdown-item" type="button">Profile</button>
          
            <button class="dropdown-item" type="button">Account Settings</button>

            <div class="dropdown-divider"></div>

            <button class="dropdown-item" type="button"  href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log-out</button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

              @csrf

            </form>

          </div>

        </div>

      </div>

      <div class="px-1 py-2 bd-highlight">
    
        <a class="d-none d-lg-block pt-2" style="color:#C4C4C4!important;" type="button">

          <i class="fas  fa-cog fa-lg"></i>
      
        </a>
      
      </div>
    
      <div class="px-1 py-2 pb-0 bd-highlight" id="div1test">
      

        <div class="btn-group">
        <a class="d-none d-lg-block pt-2" style="color:#C4C4C4!important;" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-reference="parent">

          <i class="fas fa-bell fa-lg chevron" id="testz"></i>
      
        </a>

        <div class="dropdown-menu notification dropdown-menu-right ">
        
          <h6 class="dropdown-header font-weight-bold">Notification</h6>

          <div class="dropdown-divider"></div>

          <div class="px-4">
            <small style="color:red !important">TOP-UP REQUEST:</small>
            <p>User <b>Blabla</b> requested <b>500</b> LCZ</p>
          </div>

          <div class="dropdown-divider"></div>

          <div class="px-4">
            <small style="color:red">TOP-UP REQUEST:</small>
            <p>User <b>Blabla</b> requested <b>500</b> LCZ</p>
          </div>

          <div class="dropdown-divider"></div>

          <div class="px-4">
            <small style="color:red">TOP-UP REQUEST:</small>
            <p>User <b>Blabla</b> requested <b>500</b> LCZ</p>
          </div>

          <div class="dropdown-divider"></div>

          <div class="px-4">
            <small style="color:red">TOP-UP REQUEST:</small>
            <p>User <b>Blabla</b> requested <b>500</b> LCZ</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</nav>


