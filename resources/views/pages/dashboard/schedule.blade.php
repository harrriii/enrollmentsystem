@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Schedule</h1>

    </div>
    
    <div class="row">
      <div class="col-sm-9">

      </div>
      <div class="col-sm-3">
        <div class="form-group row row-cols-2">
          <label class="col-sm-3 col-form-label text-right" for="">Filter</label>
          <select  class="form-control col-sm-9" id="cb_studType" >
            <option>All</option>
            <option>AM</option>
            <option>PM</option>
          </select>
        </div>
        
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm" id="tbl_stud">
        <thead>
          <tr>
            <th class="text-center"  width="20%">Class No</th>
            <th class="text-center" width="40%">Time</th>
            <th class="text-center" width="20%">Course</th>
            <th class="text-center" width="20%">Year</th>
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
            loadStudents('all');

            $('#nv_student').removeClass('active');
            $('#nv_dashboard').removeClass('active');
            $('#nv_schedule').addClass('active');
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

            if(studtype == 'AM'){

                var toAppend = '';

                    toAppend = '<tr>'
                            + '<td class="text-center">GA-61230</td>'
                            + '<td class="text-center">7:00 AM - 8:00 AM</td>'
    
                            + '<td class="text-center">IT</td>'
                            + '<td class="text-center">Freshman</td>'
                            
                            + '</tr>';
                            
                            $('#tbl_stud tbody').empty();
                            $('#tbl_stud tbody').append(toAppend);

                            feather.replace()

            }
            else if(studtype == 'PM'){

                var toAppend = '';

                    toAppend = '<tr>'
                            + '<td class="text-center">GA-48520</td>'
                            + '<td class="text-center">3:00 PM - 4:00 PM</td>'
  
                            + '<td class="text-center">IT</td>'
                            + '<td class="text-center">Freshman</td>'
                            
                            + '</tr>';
                    toAppend += '<tr>'
                    + '<td class="text-center">GA-58630</td>'
                    + '<td class="text-center">3:00 PM - 4:00 PM</td>'
  
                    + '<td class="text-center">IT</td>'
                    + '<td class="text-center">Freshman</td>'
                   
                    + '</tr>';
            
                            $('#tbl_stud tbody').empty();
                            $('#tbl_stud tbody').append(toAppend);

                            feather.replace()

            }
            else{
                var toAppend = '';

toAppend = '<tr>'
        + '<td class="text-center">GA-61230</td>'
        + '<td class="text-center">7:00 AM - 8:00 AM</td>'

        + '<td class="text-center">IT</td>'
        + '<td class="text-center">Freshman</td>'
        
        + '</tr>';
toAppend += '<tr>'
+ '<td class="text-center">GA-48520</td>'
+ '<td class="text-center">3:00 PM - 4:00 PM</td>'

+ '<td class="text-center">IT</td>'
+ '<td class="text-center">Freshman</td>'

+ '</tr>';

toAppend += '<tr>'
                            + '<td class="text-center">GA-58630</td>'
                            + '<td class="text-center">3:00 PM - 4:00 PM</td>'

                            + '<td class="text-center">IT</td>'
                            + '<td class="text-center">Freshman</td>'
                            
                            + '</tr>';

        $('#tbl_stud tbody').empty();
        $('#tbl_stud tbody').append(toAppend);

                

            }
        }
      

      </script>

  @endsection