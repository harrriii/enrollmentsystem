@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Enlisted Students Report</h1>

    </div>
    
    <div class="row">
      <div class="col-sm-9">

      </div>
      <div class="col-sm-3">
        <div class="form-group row row-cols-2">
          <label class="col-sm-3 col-form-label text-right" for="">Subject</label>
          <select  class="form-control col-sm-9" id="sid" >
            <option>Physical Education</option>
            <option>Algebra</option>
          </select>
        </div>
        
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th class="text-center" width="5%">
                <input type="checkbox" aria-label="Checkbox for following text input">
            </th>
            <th class="text-center"  width="15%">Student No</th>
            <th width="60%">Name</th>
            <th class="text-center" width="10%">Course</th>
            <th class="text-center" width="10%">Year</th>
            {{-- <th class="text-center" width="15%"></th> --}}
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center" >
                <input type="checkbox" aria-label="Checkbox for following text input">
            </td>
            <td class="text-center">GA-68520</td>
            <td class="">Aubrey Mandoza</td>
            <td class="text-center">IT</td>
            <td class="text-center">Freshman</td>
            {{-- <td class="text-center">
              <a class="a_icon" href=""><i data-feather="user-minus" id="test" class="m-1 icon"></i></a>
              <a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>
            </td> --}}
          </tr>

          
          <tr>
            <td class="text-center" >
                <input type="checkbox" aria-label="Checkbox for following text input">
            </td>
            <td class="text-center">GA-68520</td>
            <td class="">Jay Aubrey Macalindong</td>
            <td class="text-center">IT</td>
            <td class="text-center">Freshman</td>
            {{-- <td class="text-center">
              <a class="a_icon" href=""><i data-feather="user-minus" class="m-1 icon"></i></a>
              <a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>
            </td> --}}
          </tr>
          <tr>
            <td class="text-center" >
                <input type="checkbox" aria-label="Checkbox for following text input">
            </td>
            <td class="text-center">GA-68523</td>
            <td class="">Bytes Caliuan</td>
            <td class="text-center">CS</td>
            <td class="text-center">Sophomore</td>
            {{-- <td class="text-center">
              <a class="a_icon" href=""><i data-feather="user-minus" class="m-1 icon"></i></a>
              <a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>
            </td> --}}

          </tr>
          <tr>
            <td class="text-center" >
                <input type="checkbox" aria-label="Checkbox for following text input">
            </td>
            <td class="text-center">BM-68520</td>
            <td class="">Dolly Jane Panico</td>
            <td class="text-center">HRM</td>
            <td class="text-center">Junior</td>
            {{-- <td class="text-center">
              <a class="a_icon" href=""><i data-feather="user-minus" class="m-1 icon"></i></a>
              <a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>
            </td> --}}
          </tr>
          <tr>
            <td class="text-center" >
                <input type="checkbox" aria-label="Checkbox for following text input">
            </td>
            <td class="text-center">GA-68320</td>
            <td class="">Jepthe Carlos</td>
            <td class="text-center">HRM</td>
            <td class="text-center">Senior</td>
            {{-- <td class="text-center">
              <a class="a_icon" href=""><i data-feather="user-minus" id="test" class="m-1 icon"></i></a>
              <a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>
            </td> --}}
          </tr>
          
        </tbody>
      </table>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Download</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn ml-2 btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>
                  This week
                </button>
            </div>
        </div>
        <div class="col-8">
        </div>        
    </div>
    
  </main>


  @endsection

  
  @section('script')

      <script type="text/javascript">

        $(document.body).ready(function(){
     
            $('#nv_dashboard').addClass('active');
            $('#nv_student').removeClass('active');
            $('#nv_schedule').removeClass('active');
        })

        $(document.body).on('click', '#test', function(){
            alert("hello");
        });

        $( ".icon" )
        .mouseover(function() {
          $(this).css('transform','scale(1.2)');
        })
        .mouseout(function() {
          $(this).css('transform','scale(1)');

        });
        
      </script>

  @endsection