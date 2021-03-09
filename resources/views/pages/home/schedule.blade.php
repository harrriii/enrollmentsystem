@extends('layouts.layout_home')

@section('content')

<main class="container-fluid">

  <div class="row">
    <div class="col test"></div>
  </div>
    

  
  <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Schedules</h1>
    <p>Fusce blandit eros id ante maximus consequat. Sed interdum sem arcu, eu molestie lacus sagittis non. Maecenas pharetra tincidunt lobortis.</p>
  </div>

  <div class="container-fluid">

    <div class="row mb-5">
      <div class="col-lg-7 col-sm-6">

      </div>
      <div class="col-lg-3 col-sm-3">
        <label for="">Course</label>
        <select  class="form-control " id="exampleFormControlSelect2" required>
          <option>Bachelor of Science in Information Technology</option>
          <option>Bachelor of Science in Computer Engineering</option>
        </select>
        <div class="invalid-feedback">
            Valid first name is required.
        </div>
        
      </div>
      <div class="col-lg-2 col-sm-3">
        <label for="">Year</label>
        <select  class="form-control" id="exampleFormControlSelect2" >
          <option>Freshmen</option>
          <option>Sophomore</option>
          <option>Junior</option>
          <option>Senior</option>
        </select>
  
        
      </div>

    </div>

    <div class="row mt-3">
      <div class="col-sm-6">
        <h4 class="mb-3 border-bottom">Section A101</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Day</th>
              <th scope="col">Time</th>
              <th scope="col">Subject</th>
              <th scope="col">Professor</th>
              <th scope="col">Room</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>M/W/F</td>
              <td>7:30 - 8:30</td>
              <td>Computer Programming</td>
              <td>Prof. Ben Toledo</td>
              <td>201</td>
            </tr>
            <tr>
              <td>T/TH</td>
              <td>8:30 - 9:30</td>
              <td>Philippine Government</td>
              <td>Prof. Mark Mask</td>
              <td>201</td>
            </tr>
            <tr>
              <td>M/W/F</td>
              <td>10:00 - 11:00</td>
              <td>Algebra 1</td>
              <td>Prof. Dave Escalante</td>
              <td>201</td>
            </tr>
            <tr>
              <td>F</td>
              <td>11:00 - 12:00</td>
              <td>Physical Education 1</td>
              <td>Prof. Lea Marcos</td>
              <td>801</td>
            </tr>
            
          </tbody>
        </table>
      </div>
    
      <div class="col-sm-6">
        <h4 class="mb-3 border-bottom">Section A102</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Day</th>
              <th scope="col">Room</th>
              <th scope="col">Time</th>
              <th scope="col">Subject</th>
              <th scope="col">Professor</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>M/W/F</td>
              <td>7:30 - 8:30</td>
              <td>Computer Programming</td>
              <td>Prof. Ben Toledo</td>
              <td>201</td>
            </tr>
            <tr>
              <td>T/TH</td>
              <td>8:30 - 9:30</td>
              <td>Philippine Government</td>
              <td>Prof. Mark Mask</td>
              <td>201</td>
            </tr>
            <tr>
              <td>M/W/F</td>
              <td>10:00 - 11:00</td>
              <td>Algebra 1</td>
              <td>Prof. Dave Escalante</td>
              <td>201</td>
            </tr>
            <tr>
              <td>F</td>
              <td>11:00 - 12:00</td>
              <td>Physical Education 1</td>
              <td>Prof. Lea Marcos</td>
              <td>801</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-6">
        <h4 class="mb-3 border-bottom">Section A103</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Day</th>
              <th scope="col">Room</th>
              <th scope="col">Time</th>
              <th scope="col">Subject</th>
              <th scope="col">Professor</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>M/W/F</td>
              <td>7:30 - 8:30</td>
              <td>Computer Programming</td>
              <td>Prof. Ben Toledo</td>
              <td>201</td>
            </tr>
            <tr>
              <td>T/TH</td>
              <td>8:30 - 9:30</td>
              <td>Philippine Government</td>
              <td>Prof. Mark Mask</td>
              <td>201</td>
            </tr>
            <tr>
              <td>M/W/F</td>
              <td>10:00 - 11:00</td>
              <td>Algebra 1</td>
              <td>Prof. Dave Escalante</td>
              <td>201</td>
            </tr>
            <tr>
              <td>F</td>
              <td>11:00 - 12:00</td>
              <td>Physical Education 1</td>
              <td>Prof. Lea Marcos</td>
              <td>801</td>
            </tr>
          </tbody>
        </table>
      </div>
    
      <div class="col-sm-6">
        <h4 class="mb-3 border-bottom">Section A104</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Day</th>
              <th scope="col">Room</th>
              <th scope="col">Time</th>
              <th scope="col">Subject</th>
              <th scope="col">Professor</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>M/W/F</td>
              <td>7:30 - 8:30</td>
              <td>Computer Programming</td>
              <td>Prof. Ben Toledo</td>
              <td>201</td>
            </tr>
            <tr>
              <td>T/TH</td>
              <td>8:30 - 9:30</td>
              <td>Philippine Government</td>
              <td>Prof. Mark Mask</td>
              <td>201</td>
            </tr>
            <tr>
              <td>M/W/F</td>
              <td>10:00 - 11:00</td>
              <td>Algebra 1</td>
              <td>Prof. Dave Escalante</td>
              <td>201</td>
            </tr>
            <tr>
              <td>F</td>
              <td>11:00 - 12:00</td>
              <td>Physical Education 1</td>
              <td>Prof. Lea Marcos</td>
              <td>801</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>







  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
        <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Cool stuff</a></li>
          <li><a class="link-secondary" href="#">Random feature</a></li>
          <li><a class="link-secondary" href="#">Team feature</a></li>
          <li><a class="link-secondary" href="#">Stuff for students</a></li>
          <li><a class="link-secondary" href="#">Another one</a></li>
          <li><a class="link-secondary" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Resource</a></li>
          <li><a class="link-secondary" href="#">Resource name</a></li>
          <li><a class="link-secondary" href="#">Another resource</a></li>
          <li><a class="link-secondary" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">School</a></li>
          <li><a class="link-secondary" href="#">Questions</a></li>
          <li><a class="link-secondary" href="#">Questions</a></li>
          <li><a class="link-secondary" href="#">Questions</a></li>
        </ul>
      </div>
    </div>
  </footer>
</main>
@endsection