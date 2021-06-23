@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container-fluid">

      <div class="row ">

        <div class="col">

          <div class="box-1 p-0 mt-lg-5 mt-5" style="border-radius:10px;box-shadow: 0px 1px 11px -7px rgb(104, 104, 104);">

            <div class="row">

              <div class="col mx-4 my-3 mb-1 border-bottom pb-2 text-secondary">

                Applicants List

              </div>

            </div>

            <div class="row p-0 px-2 pt-1 my-0">

              <div class="col text-right m-3 mt-1 ">
              
                <a class="border rounded py-1 px-3 text-left text-muted" style="font-size:9pt;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
              
                  Filter
              
                  <i class="ml-1" data-feather="chevron-down"></i>
            
                </a>                                                       
              
                <div class="collapse pt-1" id="collapseExample">
        
                  <div class="card card-body" style="background:#F8F9FA">
    
                    <div class="row">

                      <div class="col-4 text-left">

                        <label class="font-weight-bold" style="font-size:9pt;">Applicant Name</label>

                        <input type="text" class="form-control form-control-sm"/>

                      </div>
              
                      <div class="col-4 text-left">
            
                        <label class="font-weight-bold" style="font-size:9pt;">Date Registered</label>
          
                        <select class="custom-select custom-select-sm">
            
                          <option selected>All</option>
            
                          <option value="1">One</option>
            
                          <option value="2">Two</option>
            
                          <option value="3">Three</option>
                
                        </select>
          
                      </div>
          
                      <div class="col-4 text-left">

                        <label class="font-weight-bold" style="font-size:9pt;">Campus</label>

                        <select class="custom-select custom-select-sm">

                          <option selected>All</option>

                          <option value="1">One</option>
        
                          <option value="2">Two</option>
        
                          <option value="3">Three</option>
        
                        </select>

                      </div>
                      
                    </div>
      
                  </div>
      
                </div>
    
              </div>
    
            </div>
    
            <div class="row">

              <div class="col m-4">
                
                <table class="table table-striped">

                  <thead>

                    <tr>

                      <th class="text-center" style="font-size:9pt;">No</th>

                      <th class="text-center" style="font-size:9pt;">Applicant</th>

                      <th class="text-center" style="font-size:9pt;">Date Registered</th>

                      <th class="text-center" style="font-size:9pt;">Campus</th>

                      <th class="text-center" style="font-size:9pt;"></th>

                    </tr>
  
                  </thead>

                  <tbody>

                  @php

                    $count = 1 ;

                  @endphp
                  
                  @foreach ($applicants as $applicant)
                  
                    <tr>

                      <td class="text-center">{{$count++}}</td>

                      <td class="text-center">{{$applicant->fullname}}</td>

                      <td class="text-center">{{$applicant->date_of_application}}</td>

                      <td class="text-center">{{$applicant->campus_name}}</td>

                      <td class="text-center">

                        <a class="a_icon applicant_view" href="/registrar/admission/applicant/information/{{$applicant->studentId}}">

                          <i data-feather="eye" class=" icon"></i>

                        </a>

                      </td>

                    </tr>
                      
                  @endforeach

                </tbody>

              </table>

            </div>

            </div>

          </div>
              
        </div>

      </div>

      <div class="row d-none">

        <div class="col">

          <div class="box-1 p-0 mt-lg-5 mt-5" style="border-radius:10px;box-shadow: 0px 1px 11px -7px rgb(104, 104, 104);">

            <div class="row">

              <div class="col mx-4 my-3 mb-1 border-bottom pb-2 text-secondary">

                Applicants Information

              </div>

            </div>

            <div class="row">

              <div class="col-lg-9 d-none d-sm-none d-lg-block ">

                <div class="px-4">

                  <div class="row">

                    <div class="pr-lg-1 col-lg-4">

                      <label style="font-size:9pt;" class="text-muted">First Name</label>
  
                      <input class="form-control form-control-sm" type="text" id="txtFirstName">

                    </div>

                    <div class="px-lg-1 col-lg-3">

                      <label style="font-size:9pt;" class="text-muted">Middle Name</label>
  
                      <input class="form-control form-control-sm" type="text" id="txtMiddleName">

                    </div>

                    <div class="px-lg-1 col-lg-3">

                      <label style="font-size:9pt;" class="text-muted">Last Name</label>
  
                      <input class="form-control form-control-sm" type="text" id="txtLastName">

                    </div>

                    <div class="pl-lg-1 col-lg-2">

                      <label style="font-size:9pt;" class="text-muted">Suffix</label>
  
                      <input class="form-control form-control-sm" type="text" id="txtSuffixName">

                    </div>

                  </div>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Nationality</label>
  
                  <input class="form-control form-control-sm" type="text" id="txtNationality">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Religion</label>
  
                  <input class="form-control form-control-sm" type="text" id="txtReligion">
  
                  <div class="row">
  
                    <div class="col-9">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">Birth Date</label>
  
                      <input class="form-control form-control-sm" type="date" id="txtBirthDate">
  
                    </div>
  
                    <div class="col-3">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">Age</label>
  
                      <input class="form-control form-control-sm" type="number" id="txtAge">
  
                    </div>
  
                  </div>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Mobile No</label>
  
                  <input class="form-control form-control-sm" type="number" id="txtMobileNo">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Email Address</label>
  
                  <input class="form-control form-control-sm" type="text" id="txtEmailAddress">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">A.C.R No</label>
  
                  <input class="form-control form-control-sm" type="text" id="txtAcrNo">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Pass No</label>
  
                  <input class="form-control form-control-sm" type="text" id="txtPassNo">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Name of Spouse</label>
  
                  <input class="form-control form-control-sm" type="text" id="txtNameOfSpouse">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">No of Siblings</label>
  
                  <input class="form-control form-control-sm" type="number" id="txtNoOfSiblings">
  
                  <h6 class="font-weight-bold text-muted mt-4 border-bottom"> Student Information </h6>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Student Type</label>
  
                  <select class="custom-select-sm custom-select" id="selStudentType"></select>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Semester</label>
  
                  <select class="custom-select-sm custom-select" id="selSemester"></select>
  
                  <div class="row">
  
                    <div class="col-6">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">School Year Start</label>
  
                      <select class="custom-select-sm custom-select" id="selSchoolYearStart"></select>
  
                    </div>
  
                    <div class="col-6">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">School Year End</label>
  
                      <select class="custom-select-sm custom-select" id="selSchoolYearEnd"></select>
  
                    </div>
  
                  </div>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Date of Application</label>
  
                  <input class="form-control form-control-sm" type="date" id="txtDateOfApplication">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Campus</label>
  
                  <select class="custom-select-sm custom-select" id="selCampus"></select>
  
                </div>

              </div>

              <div class="col-lg-3">



                {{-- <img src="{{asset("$applicant->id_picture")}}" class="  " style="width: 200px; height: 200px; border-radius:10px;"> --}}


                <div class="mt-3">
                  <small class="font-weight-bold text-center text-muted mt-5"> Applicant Signature </small>

                <img src="{{asset("img/index/qweqweqwe.png")}}" class=" " style="width: 200px; height: 60px; border-radius:10px;">

                </div>

              </div>

            </div>

            <div class=" d-sm-block d-lg-none ">

              <div class="p-4 mx-2">

                <label style="font-size:9pt;" class="text-muted">First Name</label>

                <input class="form-control form-control-sm" type="text" id="sm_txtFirstName">

                <label style="font-size:9pt;" class="text-muted mt-2">Middle Name</label>

                <input class="form-control form-control-sm" type="text" id="sm_txtMiddleName">

                <label style="font-size:9pt;" class="text-muted mt-2">Last Name</label>

                <input class="form-control form-control-sm" type="text" id="sm_txtLastName">

                <label style="font-size:9pt;" class="text-muted mt-2">Suffix</label>

                <input class="form-control form-control-sm" type="text" id="sm_txtSuffix">

                <label style="font-size:9pt;" class="text-muted mt-2">Nationality</label>
  
                  <input class="form-control form-control-sm" type="text" id="sm_txtNationality">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Religion</label>
  
                  <input class="form-control form-control-sm" type="text" id="sm_txtReligion">
  
                  <div class="row">
  
                    <div class="col-9">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">Birth Date</label>
  
                      <input class="form-control form-control-sm" type="date" id="sm_txtBirthDate">
  
                    </div>
  
                    <div class="col-3">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">Age</label>
  
                      <input class="form-control form-control-sm" type="number" id="sm_txtAge">
  
                    </div>
  
                  </div>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Mobile No</label>
  
                  <input class="form-control form-control-sm" type="number" id="sm_txtMobileNo">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Email Address</label>
  
                  <input class="form-control form-control-sm" type="text" id="sm_txtEmailAddress">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">A.C.R No</label>
  
                  <input class="form-control form-control-sm" type="text" id="sm_txtAcrNo">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Pass No</label>
  
                  <input class="form-control form-control-sm" type="text" id="sm_txtPassNo">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Name of Spouse</label>
  
                  <input class="form-control form-control-sm" type="text" id="sm_txtNameOfSpouse">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">No of Siblings</label>
  
                  <input class="form-control form-control-sm" type="number" id="sm_txtNoOfSiblings">
  
                  <h6 class="font-weight-bold text-muted mt-4 border-bottom"> Student Information </h6>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Student Type</label>
  
                  <select class="custom-select-sm custom-select" id="sm_selStudentType"></select>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Semester</label>
  
                  <select class="custom-select-sm custom-select" id="sm_selSemester"></select>
  
                  <div class="row">
  
                    <div class="col-6">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">School Year Start</label>
  
                      <select class="custom-select-sm custom-select" id="sm_selSchoolYearStart"></select>
  
                    </div>
  
                    <div class="col-6">
  
                      <label style="font-size:9pt;" class="text-muted mt-2">School Year End</label>
  
                      <select class="custom-select-sm custom-select" id="sm_selSchoolYearEnd"></select>
  
                    </div>
  
                  </div>
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Date of Application</label>
  
                  <input class="form-control form-control-sm" type="date" id="sm_txtDateOfApplication">
  
                  <label style="font-size:9pt;" class="text-muted mt-2">Campus</label>
  
                  <select class="custom-select-sm custom-select" id="sm_selCampus"></select>

              </div>

            </div>

          </div>
              
        </div>

      </div>

    </div>



  


    {{-- <div class='t' clas={{$id}}></div> --}}

    {{-- <div class="container">
    
      @if(session()->has('success-message'))
    
        <div class="row">
      
          <div class="col">
      
            <div class="alert alert-success">
      
              {{ session()->get('success-message') }}
      
            </div>
      
          </div>
      
        </div>
    
      @endif

      @if(session()->has('fail-message'))
      
        <div class="row">
        
          <div class="col">
        
            <div class="alert alert-danger">
        
              {{ session()->get('fail-message') }}
        
            </div>
        
          </div>
        
        </div>
    
      @endif
    
    </div> --}}

    {{-- <nav>

      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        
        <a class="nav-link active font-weight-bold"  style="color:#7A353C; font-size:9pt;" id="nav-home-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Control</a>
        
        <a class="nav-link "  style="color:#7A353C; font-size:9pt;" id="nav-profile-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Students</a>
      
      </div>

    </nav> --}}

    {{-- <div class="tab-content" id="nav-tabContent">
      
      <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="nav-home-tab">
        
        <div class="container-fluid">
          
          <div class="row mt-2">
            
            <div class="col-sm-9"></div>
            
            <div class="col-sm-3">
            
              <div class="form-group row row-cols-2" >
            
                <label class="col-sm-5 col-form-label text-right font-weight-bold" style="font-size: 9pt;" for="">Subject</label>
             
                <select  class="form-control col-sm-7 p-1" style="font-size: 8pt;"  id="sid" >
            
                  <option>Physical Education</option>
            
                  <option>Algebra</option>
                
                </select>
            
              </div>
          
            </div>
        
          </div>
          
          <div class="row mt-2">
            
            <div class="col-lg p-0">
              
              <div class="table-responsive-lg">
              
                <table class="table table-striped">
                
                  <thead >
                
                    <tr >
                    
                      <th class="text-center" style="font-size: 9pt !important;" width="20%">Started by</th>
                      
                      <th class="text-center" style="font-size: 9pt !important;" width="20%">Start Date</th>
                      
                      <th class="text-center" style="font-size: 9pt !important;" width="25%">End Date</th>
                    
                      <th class="text-center" style="font-size: 9pt !important;" width="10%">Status</th>
                    
                      <th class="text-center" style="font-size: 9pt !important;" width="15%"></th>
                
                    </tr>
                
                  </thead>
                  
                  <tbody>
                
                    @foreach ($batch as $enl)
                  
                    <tr>
                  
                      <td class="text-center" style="font-size: 8pt !important;" code={{$enl->no}}>{{$enl->startedBy}}</td>
                    
                      <td class="text-center" style="font-size: 8pt !important;">{{$enl->enlStart}}</td>
                    
                      <td class="text-center" style="font-size: 8pt !important;">{{$enl->enlEnd}}</td>
                    
                      <td class="text-center font-weight-bold" style="color:#7A353C;" style="font-size: 8pt !important;">{{$enl->status}}</td>
                    
                      <td class="text-center" style="font-size: 8pt !important;">
                    
                        <a class="a_icon enl_show" href='/dashboard/registrar/Subjects/{{$enl->no}}'>
                    
                          <i data-feather="book" class="icon"></i>
                        
                        </a>
                    
                        <a class="a_icon enl_edit" col_0={{$enl->no}} col_5={{$enl->status}} col_1={{$enl->enlStart}} col_2={{$enl->enlEnd}} >
                    
                          <i data-feather="edit" class="icon"></i>
                        
                        </a>
                    
                        <a class="a_icon enl_delete" col_0={{$enl->no}}>
                    
                          <i data-feather="trash-2" class="icon"></i>
                        
                        </a>
                    
                      </td>
                            
                    </tr>
                    
                    @endforeach
                
                  </tbody>
                
                </table>
              
              </div>
          
            </div>
        
          </div>
        
          <div class="row">
        
            <div class="col-sm-9"></div>
        
            <div class="col-sm-3 text-right p-0">
        
              <button type="button" class="btn text-light pb-1 pt-0" id="c_btn_add" style="font-size:9pt;background:#7A353C;height:20px;width:80px">Add</button>
        
            </div>
        
          </div>
        
        </div>
    
      </div>
      
      <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="nav-profile-tab">
      
        <div class="container-fluid">
        
          <div class="row mt-2">
        
            <div class="col-sm-9"></div>
        
            <div class="col-sm-3">
        
              <div class="form-group row row-cols-2">
        
                <label class="col-sm-3 col-form-label text-right" for="">Batch</label>
        
                <select  class="form-control col-sm-9" id="sid" >

                  @foreach ($batch as $batch)

                  <option value="{{$batch->no}}">{{$batch->no}}</option>
                      
                  @endforeach
        
                </select>
        
              </div>
        
            </div>
          </div>
        
          
          <div class="row">
    
            <div class="col-lg p-0">
    
              <div class="table-responsive">
    
                <table class="table table-striped table-sm">
    
                  <thead>
    
                    <tr>
    
                      <th class="text-center" width="20%">Course Code</th>
    
                      <th class="text-center" width="40%">Subject</th>
    
                      <th class="text-center" width="30%">No of Enlistments</th>

                      <th class="text-center" width="10%">No of Enlistments</th>
    
                    </tr>
                  </thead>
    
                  <tbody>
    
                    @foreach ($enlistment as $enl)
    
                    <tr>
    
                      <td class="px-5 text-center">{{$enl->code}}</td>
    
                      <td class="px-5">{{$enl->subject}}</td>
    
                      <td class="text-center">
    
                        <a href="#" class="badge text-light badge-success" data-toggle="modal" data-target="#staticBackdrop" style="background:#803038;font-size:10pt;">{{$enl->total}}</a>
    
                      </td>
    
                    </tr>
    
                    @endforeach
    
                  </tbody>
    
                </table>
    
              </div>
    
            </div>
    
          </div>
      
        </div>
    
      </div>
    
    </div> --}}

    @include('inc\modal\modals') 

  </main>


@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\experimentals') 

  @include('inc\js\dashboard\registrar\admission\applicant') 

@endsection

