@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Students</h1>

    </div>
    
    <div class="row">
      <div class="col-sm-9">

      </div>
      <div class="col-sm-3">
        <div class="form-group row row-cols-2">
          <label class="col-sm-3 col-form-label text-right" for="">Type</label>
          <select  class="form-control col-sm-9" id="cb_studType" >
            <option>Accepted</option>
            <option>Declined</option>
          </select>
        </div>
        
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm" id="tbl_stud">
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
         
          
        </tbody>
      </table>
    </div>
  </main>


  @endsection

  
  @section('script')

      <script type="text/javascript">

        $(document.body).ready(function(){
            loadStudents('Accepted');
            $('#nv_student').addClass('active');
            $('#nv_dashboard').removeClass('active');
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

        $("#cb_studType").change(function() {

            loadStudents($(this).val());

        });



        function loadStudents(studtype){

            if(studtype == 'Declined'){

                var toAppend = '';

                    toAppend = '<tr>'
                            + '<td class="text-center">GA-68520</td>'
                            + '<td class="">Aubrey Mandoza</td>'
                            + '<td class="text-center">IT</td>'
                            + '<td class="text-center">Freshman</td>'
                            + '<td class="text-center">'
                            + '<a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>'
                            + '</td>'
                            + '</tr>';
                    toAppend += '<tr>'
                    + '<td class="text-center">GA-68520</td>'
                    + '<td class="">Aubrey Mandoza</td>'
                    + '<td class="text-center">IT</td>'
                    + '<td class="text-center">Freshman</td>'
                    + '<td class="text-center">'
                    + '<a class="a_icon" href=""><i data-feather="user-check" class="m-1 icon"></i></a>'
                    + '</td>'
                    + '</tr>';
            
                            $('#tbl_stud tbody').empty();
                            $('#tbl_stud tbody').append(toAppend);

                            feather.replace()

            }
            else{

                var toAppend = '';

                    toAppend = '<tr>'
                            + '<td class="text-center">GA-68520</td>'
                            + '<td class="">Aubrey Mandoza</td>'
                            + '<td class="text-center">IT</td>'
                            + '<td class="text-center">Freshman</td>'
                            + '<td class="text-center">'
                            + '<a class="a_icon" href=""><i data-feather="user-minus" class="m-1 icon"></i></a>'
                            + '</td>'
                            + '</tr>';
                            
                            $('#tbl_stud tbody').empty();
                            $('#tbl_stud tbody').append(toAppend);

                            feather.replace()

            }
        }
      

      </script>

  @endsection