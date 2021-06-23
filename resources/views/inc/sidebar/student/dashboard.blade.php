<div class="container-fluid">

  <div class="row ">

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

      <div class="sidebar-sticky pt-3">

        <ul class="nav flex-column">

          <h6 class="d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted font-weight-bold" style="font-size: 8pt;">

            <span>Menu</span>
        
          </h6>

          <li class="nav-item">
          
            <a class="nav-link py-1 ml-1" style="font-size: 9pt; " href="/dashboard/student/profile" >
          
              <i data-feather="users"></i>
          
              Profile 
          
            </a>
          
          </li>
          
          <li class="nav-item">
          
            <a class="nav-link py-1 ml-1" style="font-size: 9pt;" href="/dashboard" id="nv_dashboard">
          
              <i data-feather="clipboard"></i>
          
              Enlistments 
          
            </a>
          
          </li>
      
          <li class="nav-item">
      
            <a class="nav-link py-1 ml-1 working" style="font-size: 9pt;" href="#"  id="nv_schedule">
      
              <i data-feather="clock"></i>
      
              Schedule
      
            </a>
      
          </li>

          <li class="nav-item">
 
            <a class="nav-link py-1 ml-1" style="font-size: 9pt;" type="button" data-toggle="offcanvas" id="nv_student">
 
              <i data-feather="book"></i>
 
              Grades
 
            </a>
 
          </li>

          <li class="nav-item">
 
            <a class="nav-link py-1 ml-1 working" style="font-size: 9pt;" href="#" id="nv_student">
 
              <i data-feather="book-open"></i>
 
              Transcript of Records
 
            </a>
 
          </li>

          <li class="nav-item">
          
            <a class="nav-link py-1 ml-1" style="font-size: 9pt; " href="/dashboard/student/petitions" >
          
              <i data-feather="sidebar"></i>
          
              Petitions 
          
            </a>
          
          </li>

          <li class="nav-item">
          
            <a class="nav-link py-1 ml-1" style="font-size: 9pt; " href="/dashboard/student/clearance" >
          
              <i data-feather="file"></i>
          
              Clearance 
          
            </a>
          
          </li>
  
        </ul>
  
 
        <h6 class="pt-2 d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted font-weight-bold" style="font-size: 8pt;">

          <span>Reports</span>
      
        </h6>


        
        <ul class="nav flex-column mb-2">
        
          <li class="nav-item">
        
            <a class="nav-link py-1 ml-1 working" style="font-size: 9pt;" href="#">
        
              <i data-feather="file-text"></i>
        
              Enlistment Report
        
            </a>
        
          </li>
        
          {{-- <li class="nav-item">
        
            <a class="nav-link py-1 ml-1" style="font-size: 9pt;"href="#">
        
              <i data-feather="file-text"></i>
 
              Reports 2
 
            </a>
 
          </li>
 
          <li class="nav-item">
 
            <a class="nav-link py-1 ml-1" style="font-size: 9pt;"href="#">
 
              <i data-feather="file-text"></i>
 
              Reports 3
 
            </a>
 
          </li>
 
          <li class="nav-item">
 
            <a class="nav-link py-1 ml-1" style="font-size: 9pt;"href="#">
 
              <i data-feather="file-text"></i>
 
              Reports 4
 
            </a>
 
          </li> --}}
 
        </ul>

 
        <h6 class="pt-2 d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted font-weight-bold" style="font-size: 8pt;">

          <span>System Settings</span>
      
        </h6>
 
        <ul class="nav flex-column mb-2">
 
          
 
          <li class="nav-item">
 
            <a class="nav-link py-1 ml-1 working" style="font-size: 9pt;"href="#">
 
 
              <i data-feather="user"></i>
 
              Account Settings
 
            </a>
 
          </li>
 
          <li class="nav-item">
 
            <a class="nav-link py-1 ml-1" style="font-size: 9pt;" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
 
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


