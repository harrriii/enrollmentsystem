<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link " href="/dashboard" id="nv_dashboard">
                <i data-feather="clipboard"></i>
                Students 
              </a>
            </li>
{{-- 
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/schedule" id="nv_schedule">
                <i data-feather="clock"></i>
                Schedule
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/dashboard/student" id="nv_student">
                <i data-feather="users"></i>
                Student
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/dashboard/subject" id="nv_student">
                <i data-feather="users"></i>
                Subjects
              </a>
            </li>
             --}}
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
        </div>
      </nav>
  

      @yield('content')

  </div>
</div>


