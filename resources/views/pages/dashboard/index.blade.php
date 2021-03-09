@extends('layouts.layout_dashboard')



@section('content')
  
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Enlisted Students</h1>

    </div>
    
    <div class="row">
      <div class="col-sm-9"></div>
      <div class="col-sm-3">
        <div class="form-group row row-cols-2">
          <label class="col-sm-3 col-form-label text-right" for="">Subject</label>
          {{-- @if (count($enlistments) > 0 )
          @foreach ($enlistments as $enlistment) --}}
          <select class="form-control col-sm-9" id="sel_subject" >
            @if( count($subjects) > 0)
              @foreach ($subjects as $subject)        
                <option value="{{$subject->subj_code}}">{{$subject->subj_name}}</option>
              @endforeach
            @endif
          </select>
          
        </div>
        
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th class="text-center"  width="20%">Student No</th>
            <th width="15%">Name</th>
            <th class="text-center" width="10%">Course</th>
            <th class="text-center" width="10%">Year</th>
            <th class="text-center" width="15%"></th>
          </tr>
        </thead>
        <tbody>

          @if (count($enlistments) > 0 )

            @foreach ($enlistments as $enlistment)
              <tr>
                <td class="text-center text-capitalize">{{$enlistment->profile_stud_id}}</td>
                <td class="">{{$enlistment->name}}</td>
                <td class="text-center">IT</td>
                <td class="text-center">Freshman</td>
                <td class="text-center">
                  <a class="a_icon" href=""><i data-feather="user-minus" id="test" class="m-1 icon"></i></a>
                  <a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>
                </td>
              </tr>
            @endforeach

          @else

            <tr>
              <td class="bg-white"><p>No enlistments found.</p></td>
            </tr>

          @endif

        </tbody>
      </table>
    </div>
  </main>
@endsection



  
  @section('script')

      <script type="text/javascript">

        $(document.body).ready(function(){
     
        //     $('#nv_dashboard').addClass('active');
        //     $('#nv_student').removeClass('active');
        //     $('#nv_schedule').removeClass('active');
         })

        // $(document.body).on('click', '#test', function(){
        //     alert("hello");
        // });
        

        $( ".icon" )
        .mouseover(function() {
          $(this).css('transform','scale(1.2)');
     
        })
        .mouseout(function() {
          $(this).css('transform','scale(1)');

        });

        $( "#sel_subject" ).change(function() {

          var data = "";

          $.ajax({
            url: "{{ "/loadstudents" }}",
            type:"GET",
            datatType : 'json',
            data: data,
            error: function (data)
            {
              console.log('AJAX call Failed');
            },
              success: function(data)
            {
              console.log('AJAX call success');
              $('#test').append('Add' + data.id); //data.id is showing undefined. if it `is only data it doesnt show anything but AJAX call success`
          },
          })



        });



                


      </script>

  @endsection