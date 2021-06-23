@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class='t' clas={{$id}}></div>
    
    <div class="container-fluid mt-2">
    
      @if(session()->has('success-message'))

      <div class="row">

        <div class="col">

          <div class="alert alert-close alert-success divMessage">

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

    {{-- <div class="row mt-4">

      <div class="col-lg-8 text-right">

      </div>

      <div class="col-lg-4 text-right pr-2">

        <a href="#" class="badge badge-primary px-2 py-1" style="background:#6a2121">New
          
          <span class="badge badge-light ml-2 py-1" style="background:#F8F9FA; font-size: 10pt;">{{$countNew}}</span>

        </a>

        <a href="#" class="badge badge-primary px-2 py-1" style="background:#6a2121">Approved
          
          <span class="badge badge-light ml-2 py-1" style="background:#F8F9FA; font-size: 10pt;">{{$countApproved}}</span>

        </a>

        <a href="#" class="badge badge-primary px-2 py-1" style="background:#6a2121">Declined
          
          <span class="badge badge-light ml-2 py-1" style="background:#F8F9FA; font-size: 10pt;">{{$countDeclined}}</span>

        </a>
       
      </div>

    </div> --}}


    <div class="row mt-3">

      <div class="col">
        
        <h1 class="h2 py-1 px-0 pb-0" style="font-size: 15pt">Enlistments</h1>

      </div>

    </div>

    {{-- <div class="row border rounded"> --}}

      {{-- <div class="col"> --}}

        {{-- <div class="row">
     
          <div class="col-9"></div>
        
          <div class="col-3 p-2">

            <input class="form-control form-control-sm text-right mb-2" type="text" id="txtSearch" placeholder="Search">
          
          </div>
      
        </div> --}}

        <div class="row p-2">

          <div class="col-lg-9">

            <div class="container-fluid">

              <div class="row border rounded p-2 pt-0 mt-0">

                <input type="text" hidden id="txtHSearch">

                <div class="col-sm-12 px-0">

                  <div class="table-responsive mt-2">

                    <table class="table table-striped table-sm " id="table_enlistment">
              
                      <thead>
              
                        <tr>
              
                          <th class="px-3" width="25%">Subject</th>
              
                          <th class="text-center" width="25%">Student</th>
              
                          <th class="text-center" width="15%">Date</th>
              
                          <th class="text-center" width="10%">Units</th>

                          <th class="text-center" width="15%">Status</th>
              
                          <th class="text-center" width="10%"></th>
              
                        </tr>
              
                      </thead>
              
                      <tbody>
              
                        @foreach ($enlistment as $enl)
              
                        <tr>


                          <td class="pl-3">{{$enl->subject}}</td>
              
                          <td class="pl-4">{{$enl->student}}</td>
              
                          <td class="text-center">{{$enl->date}}</td>
              
                          <td class="text-center">{{$enl->units}}</td>

                          <td class="text-center">{{$enl->current_status}}</td>

              
                          <td class="text-center">
              
                            <a class="a_icon enl_view" code={{$enl->code}} s_code={{$enl->studId}}><i data-feather="eye" class="icon"></i></a>
                            
                            @if ($enl->current_status == 'For Approval')

                            <a class="a_icon enl_decline" col_0={{$enl->code}}><i data-feather="user-minus" class="icon"></i></a>
              
                            <a class="a_icon enl_accept" col_0={{$enl->code}}><i data-feather="user-check" class="icon"></i></a>
                                
                            @endif
                                
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

          <div class="col-lg-3 p-0">
            
            <div class="border rounded ml-1 p-2">

              <div class="container-fluid">

                <div class="pl-1 py-1 row">
                  
                  <div class="col-sm-12 p-0">

                    <h1 class="h2 py-1 font-weight-bold" style="font-size: 14pt">Filters</h1>

                  </div>

                </div>

                <div class="pl-1 py-1 row ">

                  <div class="col-sm-12 rounded p-0" >
                
                    <a style="color:black;"  class="a_icon" id="f_type" data-toggle="collapse" href="#f_typeCollapse" role="button">

                      <div class="row">

                        <div class="col-10  font-weight-bold " style="font-size:11pt; ">Type</div>

                        <div class="col-2">

                          <i data-feather="chevron-down"></i>

                        </div>

                      </div>

                    </a>
                    
                    <div class="collapse multi-collapse pl-2 mt-1" id="f_typeCollapse">
                    
                      <div class="form-check">
                      
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="" checked>
                      
                        <label class="form-check-label" for="exampleRadios1">
                    
                          All
                    
                        </label>
                    
                      </div>

                      <div class="form-check">
                      
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="FOR APPROVAL" >
                      
                        <label class="form-check-label" for="exampleRadios2">
                    
                          New
                    
                        </label>
                    
                      </div>

                      <div class="form-check">
                      
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Approved" >
                      
                        <label class="form-check-label" for="exampleRadios3">
                    
                          Approved
                    
                        </label>
                    
                      </div>

                      <div class="form-check">
                      
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="Declined" >
                      
                        <label class="form-check-label" for="exampleRadios4">
                    
                          Declined
                    
                        </label>
                    
                      </div>
                  
                    </div>
                  
                  </div>

                </div>

                <div class="pl-1 py-1 row">

                  <div class="col-sm-12 p-0">
                
                    <a style="color:black" class="a_icon" id="f_type" data-toggle="collapse" href="#f_valueCollapse" role="button">

                      <div class="row">

                        <div class="col-10 font-weight-bold" style="font-size:11pt;" >Student Id</div>

                        <div class="col-2">

                          <i data-feather="chevron-down"></i>

                        </div>

                      </div>

                    </a>
                    
                    <div class="collapse multi-collapse mt-1" id="f_valueCollapse">
                    
                      <div class="input-group mb-3">
                    
                        <input type="text" class="form-control" style="font-size:9pt;">
                  
                        <div class="input-group-append" >
                  
                          <button class="btn a_icon" style="font-size:9pt;" type="button" style="border:2px solid #CED4DA" id="button-addon2">

                            <i data-feather="search"></i>

                          </button>
                  
                        </div>
                  
                      </div>
                  
                    </div>
                  
                  </div>

                </div>

              </div>

            </div>
            

            


          </div>

        </div>

      {{-- </div> --}}
    {{-- </div> --}}

    








{{-- 
    <nav>

      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        
        <a class="nav-link navs font-weight-bold active"  style="color:#7A353C; font-size:9pt;" id="btnTab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Record</a>
        
        <a class="nav-link navs  "  style="color:#7A353C; font-size:9pt;" id="btnTab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">New Enlistments</a>
      
      </div>

    </nav>

    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
        
        <div class="container-fluid">

       
          <div class="row">
            
            <div class="col-sm-12 px-0 pt-1">

              <div class="table-responsive mt-1">

                <table class="table table-striped table-sm ">
          
                  <thead>
          
                    <tr>
          
                      <th class="text-center" width="10%">Batch No</th>
                      
                      <th class="px-3" width="25%">Subject</th>
          
                      <th class="text-center" width="25%">Student</th>
          
                      <th class="text-center" width="10%">Date</th>
          
                      <th class="text-center" width="10%">Units</th>

                      <th class="text-center" width="10%">Status</th>
          
                      <th class="text-center" width="10%"></th>
          
                    </tr>
          
                  </thead>
                  
                  <tbody>
          
                    @foreach ($records as $enl)
          
                    <tr>
          
                      <td class="text-center">{{$enl->enl_batch}}</td>

                      <td class="pl-3">{{$enl->subject}}</td>
          
                      <td class="pl-4">{{$enl->student}}</td>
          
                      <td class="text-center">{{$enl->date}}</td>
          
                      <td class="text-center">{{$enl->units}}</td>

                      <td class="text-center">{{$enl->current_status}}</td>
          
                      <td class="text-center">
          
                        <a class="a_icon enl_view" code={{$enl->code}} s_code={{$enl->studId}}><i data-feather="eye" class="icon"></i></a>
          
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

      <div class="tab-pane fade show" id="tab-2" role="tabpanel">

        <div class="container">

          <div class="row">
            
            <div class="col-sm-12 px-0 pt-1">

              <div class="table-responsive mt-2">

                <table class="table table-striped table-sm ">
          
                  <thead>
          
                    <tr>
          
                      <th class="px-3" width="25%">Subject</th>
          
                      <th class="text-center" width="35%">Student</th>
          
                      <th class="text-center" width="20%">Date</th>
          
                      <th class="text-center" width="10%">Units</th>
          
                      <th class="text-center" width="10%"></th>
          
                    </tr>
          
                  </thead>
          
                  <tbody>
          
                    @foreach ($enlistment as $enl)
          
                    <tr>
          
                      <td class="pl-3">{{$enl->subject}}</td>
          
                      <td class="pl-4">{{$enl->student}}</td>
          
                      <td class="text-center">{{$enl->date}}</td>
          
                      <td class="text-center">{{$enl->units}}</td>
          
                      <td class="text-center">
          
                        <a class="a_icon enl_view" code={{$enl->code}} s_code={{$enl->studId}}><i data-feather="eye" class="icon"></i></a>
          
                        <a class="a_icon enl_decline" code={{$enl->code}}><i data-feather="user-minus" class="icon"></i></a>
          
                        <a class="a_icon enl_accept" code={{$enl->code}}><i data-feather="user-check" class="icon"></i></a>
          
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

  @include('inc\js\dashboard\adviser\enlistments') 

@endsection


 