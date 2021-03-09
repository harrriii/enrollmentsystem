<div class="container-fluid">

  <div class="row mt-0">

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

      <div class="sidebar-sticky pt-3">

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted font-weight-bold" style="font-size: 8pt;">
        
          <span>Modules</span>
    
        </h6>

        <ul class="nav flex-column">

          <li class="nav-item">
   
            <a class="nav-link"  style="font-size: 9pt;" href="/dashboard" id="nv_dashboard">
   
              <i data-feather="clipboard"></i>
   
              Subjects 
   
            </a>
   
          </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
   
          <span>Reports</span>
   
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
   
            <i data-feather="plus-circle"></i>
   
          </a>
   
        </h6>

        <ul class="nav flex-column mb-2">
   
          <li class="nav-item">
   
            <a class="nav-link" href="/dashboard/report">
   
              <i data-feather="file-text"></i>
   
              Enlistment Report
   
            </a>
   
          </li>
   
          <li class="nav-item">
   
            <a class="nav-link" href="#">
   
              <i data-feather="file-text"></i>
   
              Reports 2
   
            </a>
   
          </li>
   
          <li class="nav-item">
   
            <a class="nav-link" href="#">
   
              <i data-feather="file-text"></i>
   
              Reports 3
   
            </a>
   
          </li>
   
          <li class="nav-item">
   
            <a class="nav-link" href="#">
   
              <i data-feather="file-text"></i>
   
              Reports 4
   
            </a>
   
          </li>
   
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

          <span>System Settings</span>

        </h6>

        <ul class="nav flex-column mb-2">

          <li class="nav-item">

            <a class="nav-link" href="#">

              <i data-feather="hard-drive"></i>

              Import and Export

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="#">

              <i data-feather="user"></i>
             
              Account Settings
              
            </a>
     
          </li>
     
          <li class="nav-item">
     
            <a class="nav-link " href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
     
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


