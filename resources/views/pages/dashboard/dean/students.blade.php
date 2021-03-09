@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Students Grade Approval</h1>

    </div>

    <div class='t' clas={{$id}}></div>

    <div class="container-fluid">
      @if(session()->has('success-message'))
      <div class="row">
        <div class="col">
          <div class="alert alert-success divMessage">
            {{ session()->get('success-message')}}
          </div>
        </div>
      </div>
      @endif
      @if(session()->has('fail-message'))
        <div class="row">
          <div class="col">
            <div class="alert alert-success divMessage">
              {{ session()->get('fail-message')}}
            </div>
          </div>
        </div>
      @endif
    </div>
    
    <div class="row">
      <div class="col-sm-8">

      </div>
      <div class="col-sm-4">

        <div class="container">
          <div class="form-group row row-cols-2">
            <label class="col-sm-3 col-form-label text-right" for="">Filter</label>
            <select  class="form-control col-sm-9" id="sid" >
              {{-- @foreach ($filter as $fl)
                <option value={{$fl->code}}>{{$fl->subject}}</option>
              @endforeach --}}
  
              <option value="">Filter by Course</option>
  
  
            </select>
          </div>
        </div>
        
        
    
        
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th class="text-center" width="12%">Student No</th>
            <th width="20%">Subject</th>
            <th width="25%">Student</th>
            <th width="20%">Professor</th>
            <th class="text-center" width="11%">Grade</th>
            <th class="text-center" width="12%"></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($grades as $grade)

          <tr>
            <td class="text-center">{{$grade->studentNo}}</td>
            <td >{{$grade->subject}}</td>
            <td>{{$grade->student}}</td>
            <td>{{$grade->professor}}</td>
            <td class="text-center">{{$grade->grade}}</td>
           

            <td class="text-center">
              <a class="a_icon grd_view"><i data-feather="eye" class="m-1 icon"></i></a>
              <a class="a_icon grd_decline" code={{$grade->no}}><i data-feather="user-minus" class="m-1 icon"></i></a>
              <a class="a_icon grd_accept" code={{$grade->no}}><i data-feather="user-check" class="m-1 icon"></i></a>
            </td>
            
          </tr>

              
          @endforeach

          
        </tbody>
      </table>
      
    </div>


{{-- <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Global Search</h5>
      </div>
      <div class="modal-body">
       <form action="">

        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-sm">
              <input class="form-control" required="" name="txtStudentNo" type="text" value="">
            </div>
            <div class="col-lg-2 col-sm">            
              <button type="button" class="btn text-light" data-toggle="modal" data-dismiss="modal" style="background:#7A353C">Search</button>
            </div>
          </div>

          <div class="row">
            <div class="col-sm">
              <h6 class="font-weight-bold mt-3 ">Showing Results: 2</h6>
            </div>
          </div>
        

          <div class="tab-content" id="test">
            <div class="tab-pane fade show active" id="students" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-sm">
                  <h6 class="mb-3 mt-2 border-bottom">Students</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-secondary" role="alert">
                    <label class="font-weight-bold">Section:</label>
                    <label class="">A501</label><br>
                    <label class="font-weight-bold">Name:</label>
                    <label class="">Mark C. Ben</label><br>
                    <label class="font-weight-bold">Course:</label>
                    <label class="">Bachelor of Science in information Technology</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-secondary" role="alert">
                    <label class="font-weight-bold">Section:</label>
                    <label class="">A501</label><br>
                    <label class="font-weight-bold">Name:</label>
                    <label class="">Devon A. Larrat</label><br>
                    <label class="font-weight-bold">Course:</label>
                    <label class="">Bachelor of Science in information Technology</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-sm">
                  <h6 class="mb-3 mt-2 border-bottom">Courses</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-secondary" role="alert">
                    <label class="font-weight-bold">Section:</label>
                    <label class="">A501</label><br>
                    <label class="font-weight-bold">Name:</label>
                    <label class="">Mark C. Ben</label><br>
                    <label class="font-weight-bold">Course:</label>
                    <label class="">Bachelor of Science in information Technology</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-secondary" role="alert">
                    <label class="font-weight-bold">Section:</label>
                    <label class="">A501</label><br>
                    <label class="font-weight-bold">Name:</label>
                    <label class="">Devon A. Larrat</label><br>
                    <label class="font-weight-bold">Course:</label>
                    <label class="">Bachelor of Science in information Technology</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center" >
            <li class="page-item"><a class="page-link" style="color:#7A353C" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link nav-link" style="color:#7A353C" role="tab" href="#students">1</a></li>
            <li class="page-item"><a class="page-link nav-link"  style="color:#7A353C" role="tab" href="#courses">2</a></li>
            <li class="page-item"><a class="page-link" style="color:#7A353C" href="#">Next</a></li>
          </ul>
        </nav>

       
       
         
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-light pb-3 pt-0" data-toggle="modal" data-dismiss="modal" style="background:#7A353C;height:25px;width:80px">Close</button>
      </div>
    </div>
  </div>
</div> --}}
@include('inc\modal\modals') 
  </main>




  @endsection

  
  @section('script')

  
  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\dean\students') 

{{-- 
      <script type="text/javascript">

        $(document.body).ready(function(){
     
            $('#nv_dashboard').addClass('active');
            $('#nv_student').removeClass('active');
            $('#nv_schedule').removeClass('active');
            // keypressCheck(e);

        
        })

        $(document.body).on('click', '#test', function(){
            alert("hello");
        });

        $(document.body).on('click', '.page-link', function(){
          $('#test a[href="'+$(this).attr('x')+'"]').tab('show')

          // alert('#test a[href="'+$(this).attr('x')+'"]')
        });

        $( ".icon" )
        .mouseover(function() {
          $(this).css('transform','scale(1.2)');
        })
        .mouseout(function() {
          $(this).css('transform','scale(1)');

        });

        document.onkeydown = function(evt) {
          // evt.preventDefault();
            evt = evt || window.event;
            if (evt.ctrlKey && evt.keyCode == 192) {
               $('#staticBackdrop').modal('toggle');
            }
        };
        
      </script> --}}

  @endsection