@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  
      <h1 class="h2" style="font-size: 15pt">Enlistments</h1>
  
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

    <nav>

      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        
        <a class="nav-link active font-weight-bold"  style="color:#7A353C; font-size:9pt;" id="nav-home-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Record</a>
        
        <a class="nav-link "  style="color:#7A353C; font-size:9pt;" id="nav-profile-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">New Enlistments</a>
      
      </div>

    </nav>

    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
        
        <div class="container-fluid">

          <div class="row mt-2">
            
            <div class="col-sm-9"></div>
            
            <div class="col-sm-3">
            
              <div class="form-group row row-cols-2 pt-2" >
            
                <label class="col-sm-10 col-form-label text-right font-weight-bold px-2" style="font-size: 9pt;" for="">Batch</label>
             
                <select  class="form-control col-sm-2 p-1" style="font-size: 8pt;"  id="sid" >

                  <option value='*'>All</option>
            
                  @foreach ($filter as $rF)

                    <option value={{$rF->no}}>{{$rF->no}}</option>
       
                  @endforeach
                
                </select>
            
              </div>
          
            </div>
        
          </div>

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

    </div>

    @include('inc\modal\modals') 
    
  </main>

@endsection


@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\adviser\enlistments') 

@endsection


 