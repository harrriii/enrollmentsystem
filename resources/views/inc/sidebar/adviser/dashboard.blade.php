<div class="container-fluid">
   
  <div class="row">
    
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
     
        <div class="sidebar-sticky pt-3">

          <h6 class="d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted font-weight-bold " style="font-size: 8pt;">
     
            <span>Menu</span>
     
          </h6>
       
          <ul class="nav flex-column">

            <li class="nav-item py-0">
       
              <a class="nav-link text-secondary py-1 ml-1" href="/dashboard" style="font-size: 9pt;" id="nv_dashboard">
       
                <i data-feather="clipboard"></i>
       
                Enlistment 
       
              </a>
       
            </li>

          </ul>
  
          <h6 class="font-weight-bold d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted" style="font-size: 8pt;">

            <span>System Settings</span>

          </h6>

          <ul class="nav flex-column mb-2">

            {{-- <li class="nav-item py-0">

              <a class="nav-link text-secondary py-1 ml-1" style="font-size: 9pt;" href="#">

                <i data-feather="hard-drive"> </i>

                Import

              </a>

            </li> --}}

            <li class="nav-item py-0">

              <a class="nav-link text-secondary py-1 ml-1" style="font-size: 9pt;" href="#">

                <i data-feather="user"></i>

                Account Settings

              </a>

            </li>

            <li class="nav-item py-0">

              <a class="nav-link text-secondary py-1 ml-1" style="font-size: 9pt;" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                <i data-feather="log-out"></i>

                Log - out

              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                @csrf

              </form>

            </li>

          </ul>

        </div>
     
      </nav>

      @yield('content')

  </div>

</div>


