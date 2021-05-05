@extends('layouts.layout_dashboard')

@section('content')



  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Profile</h1>
    </div>

    <form method="POST" action="http://mlqu.org/studentregistration" accept-charset="UTF-8" class="needs-validation" novalidate=""><input name="_token" type="hidden" value="86IqSLhb8qXfh3HvdNjMXHQCpDyj4om9nsGfSimf">

      <input type="hidden" name="_token" value="86IqSLhb8qXfh3HvdNjMXHQCpDyj4om9nsGfSimf">

      <img src="{{asset('/img/index/img1.jpg')}}" class="rounded mx-auto d-block" alt="..." style="width: 200px; height: 200px;">


      <h4 class="mb-3 border-bottom">Student Information</h4>
      <div class="container">

        <div class="row">
          <div class="col-sm-3 mt-1 mb-0">
            <label for="" class="form-label">First Name</label>
            <input class="form-control" required="" name="txtFname" type="text" value="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="col-sm-3 mt-1 mb-0">
              <label for="" class="form-label">Middle Name</label>
            <input class="form-control" name="txtMname" type="text" value="">
          </div>

          <div class="col-sm-3 mt-1 mb-0">
              <label for="lastName" class="form-label">Last Name</label>
              <input class="form-control" required="" name="txtLname" type="text" value="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
          </div>

          <div class="col-sm-3 mt-1 mb-0">
              <label for="lastName" class="form-label">Suffix</label>
              <input class="form-control" name="txtSuffix" type="text" value="">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 mt-1 mb-0">
            <label for="" class="form-label">Birth Date</label>
            <input class="form-control" required="" data-provide="datepicker" autocomplete="off" name="txtBdate" type="text" value="">
            <div class="invalid-feedback">
              Valid Birth date is required.
            </div>
          </div>

          <div class="col-lg-3 mt-1 mb-0">
            <label for="lastName" class="form-label">Birth Place</label>
            <input class="form-control" required="" name="txtBirthPlace" type="text" value="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>

          <div class="col-lg-3 mt-1 mb-0">
            <label for="firstName" class="form-label">Civil Status</label>
            <select class="custom-select form-control" require="" name="txtCivilStatus"><option value="Single" selected="selected">Single</option><option value="Married">Married</option></select>
            <div class="invalid-feedback">
            Valid first name is required.
            </div>
          </div>

          <div class="col-lg-3 mt-1 mb-0">
            <label for="exampleFormControlSelect2">Gender</label>
            <select class="custom-select form-control" require="" name="txtGender"><option value="Male">Male</option><option value="Female">Male</option></select>
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
          </div>
        </div>

      </div>

      <h4 class="mb-3 mt-5 border-bottom">Academic Information</h4>
        <div class="container">

          <div class="row">

            <div class="col-lg-4 mt-1 mb-1">
              <label for="">Student No</label>
              <input class="form-control" required="" name="txtStudentNo" type="text" value="">
              <div class="invalid-feedback">
                  Valid first name is required.
              </div>
            </div>

            <div class="col-lg-4 mt-1 mb-1">
              <label for="">Course</label>
              <select class="custom-select form-control" require="" name="txtCourse"></select>
              <div class="invalid-feedback">
                  Valid first name is required.
              </div>
            </div>

            <div class="col-lg-4 mt-1 mb-1">
              <label for="">Campus</label>
              <select class="custom-select form-control" require="" name="txtCampus"><option value="MLQU Manila" selected="selected">MLQU Manila</option><option value="MLQU Pasig">MLQU Pasig</option></select>
              <div class="invalid-feedback">
                  Valid first name is required.
              </div>
            </div>

          </div>

          <div class="row row-cols-2">
            <div class="col-sm-4 col-lg-4 mt-1 mb-1">
              <label for="">Type of Entry</label>
              <select class="custom-select form-control" require="" name="txtTypeOfEntry"><option value="Transferee" selected="selected">Transferee</option><option value="New">New</option></select>
              <div class="invalid-feedback">
                  Valid first name is required.
              </div>
            </div>

            <div class="col-sm-4 col-lg-4 mt-1 mb-1">
              <label for="">Year</label>
              <select class="custom-select form-control" require="" name="txtYear"></select>
              <div class="invalid-feedback">
                  Valid first name is required.
              </div>
            </div>


            <div class="col-sm-4 col-lg-2 mt-1 mb-1">
                  <label for="">School Year</label>
                  <select class="custom-select form-control" require="" name="txtSchoolYear"><option value="20">2020-2021</option><option value="21">2021-2022</option></select>
                  <div class="invalid-feedback">
                      Valid first name is required.
                  </div>
              </div>

            <div class="col-sm-4 col-lg-2 mt-1 mb-1">
                  <label for="">Term</label>
                  <select class="custom-select form-control" require="" name="txtTerm"><option value="1st Term">1st Term</option><option value="2nd Term">2nd Term</option><option value="3rd Term">3rd Term</option></select>
                  <div class="invalid-feedback">
                      Valid first name is required.
                  </div>
              </div>
          </div>
        </div>

       


          <div class="row p-4">
            <div class="col-lg-12 text-center">
              <input class="btn btn-sm mlqu-color mx-auto" type="submit" value="Update">
             
            </div>
          </div>       
        </div>


      </form>

    
    
    
    
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