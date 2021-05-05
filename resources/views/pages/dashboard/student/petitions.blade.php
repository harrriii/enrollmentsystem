@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="t" i="{{$studentId}}" eno="{{$enlistmentno}}" ></div>

    <div class="container-fluid mt-3 px-0">
    
      <div class="row">
    
        <div class="col">

          <nav>
    
            <div class="nav nav-tabs " id="nav-tab" role="tablist" style="font-size: 9pt;">
          
              <a class="nav-link a_icon active " data-toggle="tab" href="#myPetitions" role="tab">My Petitions</a>

              <a class="nav-link a_icon active " data-toggle="tab" href="#petitions" role="tab">Petitions</a>

            </div>
          
          </nav>
          
          <div class="tab-content" id="nav-tabContent">
          
            <div class="tab-pane fade show active border-right border-bottom border-left" id="myPetitions" role="tabpanel">

              <div class="p-3">
            
                <div class="container-fluid">
            
                  <div class="row pt-2" style="font-size:9pt;">

                    <div class="col-sm-9  col-lg-10 col-xl-11 col-9"></div>

                    <div class="col-sm-3 col-lg-2 col-xl-1 col-3 p-0">

                      <select class="custom-select my-1 mr-lg-0 mx-sm-0 " style="font-size:9pt;">
                    
                        <option class="font-weight-bold" style="font-size:9pt;">Batch</option>

                        @foreach ($filter as $fl)
              
                          <option class="text-right" value={{$fl->enlismentbatch}}>{{$fl->enlismentbatch}}</option>
            
                        @endforeach
    
                      </select>
                      
                    </div>
            
                  </div>
            
                  <div class="row pt-3">
                    
                    <div class="col p-0">
                      
                      <div class="table-responsive">
             
                        <table class="table table-striped table-sm table-hscroll" >
                   
                          <thead>
                   
                            <tr>
                   
                              <th width="30%;">Subject</th>
                   
                              <th class="text-center" width="30%">Date</th>
                   
                              <th class="text-center" width="10%">Units</th>
                   
                              <th class="text-center" width="40%">Status</th>
                   
                            </tr>
                   
                          </thead>
                   
                          <tbody>
                   
                            @foreach ($enlistment as $enl)
                            
                            <tr>
                      
                              <td style="padding-left:15px !important;">{{$enl->subject}}</td>
                      
                              <td class="text-center">{{$enl->date}}</td>
                      
                              <td class="text-center">{{$enl->units}}</td>
                      
                              @if ( $enl->status == 'FOR APPROVAL' )
                      
                              <td class="text-center font-weight-bold" style="color:#AC1321 !important;">{{$enl->status}}</td>
                      
                              @endif
                      
                              @if ( $enl->status == 'Approved' )
                      
                              <td class="text-center font-weight-bold" style="color:green !important;">{{$enl->status}}</td>
                      
                              @endif
                      
                              @if ( $enl->status == 'Declined' )
                      
                              <td class="text-center font-weight-bold" style="color:red !important;">{{$enl->status}}</td>
                      
                              @endif
                      
                            </tr>
                      
                            @endforeach
                     
                          </tbody>
                   
                        </table>
                   
                      </div>
            
                    </div>
                    
                  </div>
             
                </div>

              </div>
      
            </div>
          
            <div class="tab-pane fade border-right border-bottom border-left" id="petitions" role="tabpanel">

              @if ($enlistmentno != 0)
              
                <div class="container-fluid">
                
                  <form action="enlistment" method="post">

                    <div class="container">
     
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
       
                    </div>

                    <div class="row">
                  
                      <div class="col-12 d-block d-sm-none my-2 p-2">

                        <button type="button" class="btn btn-sm mlqu-color text-light" style="font-size:9pt;" data-toggle="offcanvas">View Grades</button>
                        
                        <button type="button" class="btn btn-sm mlqu-color text-light" style="font-size:9pt;" data-toggle="offcanvas">View TOR</button>

                      </div>

                    </div>
          
                    <div class="row pt-lg-4 pt-sm-4">

                        <div class="col-lg-7">
                        
                          <div class="form-group">
                
                            <div class="row ">
        
                              <div class="col pt-1">
      
                                  <h5 class="font-weight-bold">Subjects</h5>
      
                              </div>
                              
                              <div class="col">

                                <input class="form-control form-control-sm text-right mb-2" type="text" id="txtSearch" placeholder="Search">

                              </div>
                              
                            </div>
                  

                            @if (count($subjects) < 0)

                              <div class="row mt-3" id="noSubjectField">
                      
                                <div class="col">
                      
                                  <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" >
                    
                                      No Subject Available.
                    
                                  </div>
                    
                                </div>
                        
                              </div>
                                
                            @else

                              <div class="border rounded p-3" id="subjectField">

                                <div class="row mt-2">
                                  <div class="col">
                                    <label class="font-weight-bold" style="font-size:9pt;">Filter</label>
                                  </div>
                                </div>

                                <div class="row">

                                  <div class="col-12 col-sm-6 col-lg-9 pr-lg-0 pb-2">

                                    <select class="custom-select" style="font-size:9pt;">

                                      <option class="font-weight-bold" style="font-size:9pt;">Program</option>

                                      @foreach ($courses as $course)

                                        <option value="{{$course->cour_code}}">{{$course->cour_name}}</option>
                                          
                                      @endforeach

                                    </select>

                                  </div>

                                  <div class="col-12 col-sm-6 col-lg-3">

                                    <select class="custom-select" style="font-size:9pt;">

                                      <option class="font-weight-bold" style="font-size:9pt;">Year</option>

                                      @foreach ($years as $year)

                                        <option value="{{$year->yr_code}}">{{$year->yr_name}}</option>
                                          
                                      @endforeach

                                    </select>

                                  </div>
                                
                                </div>
          
                                <div class="row mt-4" >
          
                                  <div class="col border-bottom border-top pt-4">
        
                                      <div class="row">
      
                                        <div class="col">
      
                                            <label class="font-italic " style="font-size:9pt;">Major Subjects </label>
      
                                        </div>
                                            
                                      </div>

                                      <div class="row">
            
                                        <div class="col" id="empty_major">
                                          
                                          <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" id="alert_noSelected">
          
                                            No subjects found.
                          
                                          </div>

                                        </div>
        
                                      </div>
          
                                      <div class="table-responsive">
                                      
                                        <table class="table table-striped table-sm table-hscroll" id="tbl_major" hidden>
            
                                          <thead style="font-size:10pt;">
        
                                            <tr>
        
                                              <th scope="col" ><input disabled class="" id="checkAllMajor" type="checkbox"></th>
                                             
                                              <th scope="col">Course Code</th>
                                              
                                              <th scope="col">Subject</th>
        
                                              <th scope="col">Prerequisite</th>
        
                                              <th scope="col">Unit</th>
        
                                            </tr>
        
                                          </thead>
        
                                          <tbody style="font-size: 9pt;">
                                            
                                            @foreach ($subjects as $subject)

                                              @if ($subject->subjectCategory == "Major" && $subject->for_yr == $yr)

                                                <tr>

                                                  @if ( $enlistedSubjects->contains('subject_course_code',$subject->course_code))
                                                  
                                                    <td><input type="checkbox" disabled checked  p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}" c="{{$subject->course_code}}"></td>

                                                    @else

                                                    <td><input type="checkbox"  class="chkSubject chkMajor" p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}"  c="{{$subject->course_code}}"></td>

                                                    <script>

                                                      c = document.getElementById('checkAllMajor');

                                                      c.removeAttribute('disabled');

                                                    </script>
                                                      
                                                  @endif

                                                  <td>{{$subject->course_code}}</td>
        
                                                  <td>{{$subject->subject}}</td>

                                                  <td>{{$subject->prerequisite}}</td>
        
                                                  <td>{{$subject->units}}</td>

                                                  <td class="d-none">{{$subject->for_yr}}</td>

                                                  <td class="d-none">{{$subject->cour_code}}</td>

                                                </tr>

                                                <script>

                                                  tblm = document.getElementById('tbl_major');

                                                  o = document.getElementById('empty_major');

                                                  tblm.removeAttribute("hidden");

                                                  o.setAttribute("hidden",true);

                                                </script>
                                                    
                                              @endif

                                            @endforeach 
                                          
                                          </tbody>
            
                                        </table>

                                      </div>
          
                                  </div>
            
                                </div>
            
                                <div class="row mt-4" >
            
                                    <div class="col border-bottom">
            
                                        <div class="row">
            
                                            <div class="col">
            
                                                <label class="font-italic" style="font-size:9pt;">Minor Subjects </label>
            
                                            </div>
            
                                        </div>
            
                                        <div class="row">
            
                                            <div class="col" id="empty_minor">
                                              
                                              <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" id="alert_noSelected">
              
                                                No subjects found.
                              
                                              </div>

                                            </div>
            
                                        </div>
            
                                        <table class="table table-striped table-sm table-hscroll" id="tbl_minor" hidden>
            
                                            <thead style="font-size:10pt;">
            
                                                <tr>
            
                                                    <th scope="col"><input disabled id="chkAllMinor" type="checkbox"></th>
            
                                                    <th scope="col">Course Code</th>

                                                    <th scope="col">Subject</th>
            
                                                    <th scope="col">Prerequisite</th>
            
                                                    <th scope="col">Unit</th>
            
                                                    
                                                </tr>
                      
                                            </thead>
                      
                                            <tbody style="font-size: 9pt">

                                              @foreach ($subjects as $subject)

                                                @if ($subject->subjectCategory == "Minor" && $subject->for_yr == $yr)
                                                  
                                                  <tr>

                                                    @if ( $enlistedSubjects->contains('subject_course_code',$subject->course_code))
                                                  
                                                      <td><input type="checkbox" disabled checked  p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}" c="{{$subject->course_code}}"></td>
                                                  
                                                    @else

                                                      <td><input type="checkbox"  class="chkSubject chkMinor" p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}"  c="{{$subject->course_code}}"></td>
                                                        
                                                      <script>

                                                        c = document.getElementById('chkAllMinor');
  
                                                        c.removeAttribute('disabled');
  
                                                      </script>

                                                    @endif

                                                    <td>{{$subject->course_code}}</td>

                                                    <td>{{$subject->subject}}</td>

                                                    <td>{{$subject->prerequisite}}</td>
          
                                                    <td>{{$subject->units}}</td>

                                                    <td class="d-none">{{$subject->for_yr}}</td>

                                                    <td class="d-none">{{$subject->cour_code}}</td>

                                                  </tr>

                                                  <script>

                                                    tblm = document.getElementById('tbl_minor');

                                                    o = document.getElementById('empty_minor');

                                                    tblm.removeAttribute("hidden");

                                                    o.setAttribute("hidden",true);

                                                  </script>
                                                      
                                                @endif

                                              @endforeach 

                                            </tbody>
                      
                                        </table>
                      
                                    </div>
                      
                                </div>
            
                                <div class="row mt-4" >
            
                                    <div class="col border-bottom">
            
                                        <div class="row">
            
                                            <div class="col">
            
                                                <label class="font-italic" style="font-size:9pt;">Other Subjects </label>
            
                                            </div>
            
                                        </div>
                                        
                                        <div class="row">
            
                                          <div class="col" id="empty_other">
                                            
                                            <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" id="alert_noSelected">
            
                                              No subjects found.
                            
                                            </div>

                                          </div>
          
                                        </div>

                                        <div class="table-responsive">

                                          <table class="table table-striped table-sm table-hscroll" id="tbl_other" hidden>
                  
                                            <thead style="font-size:10pt;">
                  
                                                <tr>
                  
                                                    <th scope="col"><input disabled id="checkAllOther" type="checkbox"></th>
                  
                                                    <th scope="col">Course Code</th>

                                                    <th scope="col">Subject</th>
                  
                                                    <th scope="col">Prerequisite</th>
                  
                                                    <th scope="col">Unit</th>
                        
                                                </tr>
                
                                            </thead>
                
                                            <tbody style="font-size: 9pt">

                                              @foreach ($subjects as $subject)

                                                @if ($subject->for_yr != $yr)

                                                  <tr>
                                                
                                                    @if ( $enlistedSubjects->contains('subject_course_code',$subject->course_code))
                                                  
                                                      <td><input type="checkbox" disabled checked  p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}" c="{{$subject->course_code}}"></td>
                                            
                                                  
                                                    @else

                                                      <td><input type="checkbox"  class=" chkOther" p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}"  c="{{$subject->course_code}}"></td>
                                                        
                                                      <script>

                                                        c = document.getElementById('checkAllOther');
  
                                                        c.removeAttribute('disabled');
  
                                                      </script>

                                                    @endif

                                                    <td>{{$subject->course_code}}</td>
                                                    
                                                    <td>{{$subject->subject}}</td>

                                                    <td>{{$subject->prerequisite}}</td>
          
                                                    <td>{{$subject->units}}</td>

                                                    <td class="d-none">{{$subject->for_yr}}</td>

                                                    <td class="d-none">{{$subject->cour_code}}</td>

                                                  </tr>

                                                  <script>

                                                    tblm = document.getElementById('tbl_other');

                                                    o = document.getElementById('empty_other');

                                                    tblm.removeAttribute("hidden");

                                                    o.setAttribute("hidden",true);

                                                  </script>
                                                    
                                                @endif
                                               
                                              @endforeach 

                                            </tbody>
                
                                          </table>

                                        </div>
                
                                    </div>
                
                                </div>
                                
                                <div class="row mt-4" >
            
                                  <div class="col">
          
                                      <div class="row">
          
                                          <div class="col-4">
          
                                              <label class="font-italic" style="font-size:9pt;">Petitioned Subjects </label>
          
                                          </div>

                                          <div class="col-8 text-right">

                                            <a href="" ><i data-feather="plus-square" class="mlqu-color-item" ></i></a>

                                          </div>
          
                                      </div>
                                      
                                      <div class="row">
          
                                        <div class="col" id="empty_other">
                                          
                                          <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" id="alert_noSelected">
          
                                            No subjects found.
                          
                                          </div>

                                        </div>
        
                                      </div>

                                      <div class="table-responsive">

                                        <table class="table table-striped table-sm table-hscroll" id="tbl_other" hidden>
                
                                          <thead style="font-size:10pt;">
                
                                              <tr>
                
                                                  <th scope="col"><input disabled id="checkAllOther" type="checkbox"></th>
                
                                                  <th scope="col">Subject</th>
                
                                                  <th scope="col">Prerequisite</th>
                
                                                  <th scope="col">Unit</th>
                      
                                              </tr>
              
                                          </thead>
              
                                          <tbody style="font-size: 9pt">

                                            @foreach ($subjects as $subject)

                                              @if ($subject->for_yr != $yr)

                                                <tr>
                                              
                                                  @if ( $enlistedSubjects->contains('subject_course_code',$subject->course_code))
                                                
                                                    <td><input type="checkbox" disabled checked  p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}" c="{{$subject->course_code}}"></td>
                                          
                                                
                                                  @else

                                                    <td><input type="checkbox"  class="chkSubject chkOther" p1={{$subject->prerequisite}} s="{{$subject->subject}}" u="{{$subject->units}}"  c="{{$subject->course_code}}"></td>
                                                      
                                                    <script>

                                                      c = document.getElementById('checkAllOther');

                                                      c.removeAttribute('disabled');

                                                    </script>

                                                  @endif
                                                  
                                                  <td>{{$subject->subject}}</td>

                                                  <td>{{$subject->prerequisite}}</td>
        
                                                  <td>{{$subject->units}}</td>

                                                  <td class="d-none">{{$subject->for_yr}}</td>

                                                  <td class="d-none">{{$subject->cour_code}}</td>

                                                </tr>

                                                <script>

                                                  tblm = document.getElementById('tbl_other');

                                                  o = document.getElementById('empty_other');

                                                  tblm.removeAttribute("hidden");

                                                  o.setAttribute("hidden",true);

                                                </script>
                                                  
                                              @endif
                                             
                                            @endforeach 

                                          </tbody>
              
                                        </table>

                                      </div>
              
                                  </div>
              
                              </div>
                              </div> 
                                
                            @endif

                          </div>
                            
                        </div>
            
                        <div class="col-lg-5 pt-lg-2 pt-sm-0 py-1">
            
                          <div class="card" style="margin-top:28px;">
          
                            <div class="card-header">
        
                              Summary of Selected Subjects
        
                            </div>
        
                            <div class="card-body">
      
                              <table class="table" id="tbl_selected">
                
                                <thead>
            
                                  <tr>
                                  
                                    <th scope="col">Subject</th>
            
                                    <th scope="col">Unit</th>

                                  </tr>
            
                                </thead>
            
                                <tbody>
            
                                </tbody>
                                
                              </table>
              
                              <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" id="qwe">
              
                                No selected subjects found.
              
                              </div>
              
                              <div class="row">
              
                                <div class="col-lg"></div>
            
                                <div class="col-sm text-right"> <button type="button" class="btn text-light" style="background:#7A353C;height:30px;font-size:9pt;"  no=''  id="btn_submit">Submit</button></div>
              
                              </div>
                                
                            </div>
                  
                          </div>
                    
                        </div>
                
                    </div>
              
                  </form>

                </div>

              @else

                <div class="p-4">

                  <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" >
                    
                    Enlistment period is closed.

                  </div>
                  
                </div>

                

              @endif


             
      
            </div>
          
          </div>

    
        </div>
    
      </div>
    
    </div>
   










    





    <div class="navbar-collapse offcanvas-collapse bg-light" >

      <div class="container-fluid">

        <div class="row mt-2">

          <div class="col-sm-12">
            
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
             close
            </button>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

              <h1 class="h2">Grades</h1>
        
            </div>

          </div>

        </div>

      </div>
      
     
    </div>

    
   
      
    
    @include('inc\modal\modals') 
  </main>

  

  @endsection

  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\student\enlistment') 

  @endsection