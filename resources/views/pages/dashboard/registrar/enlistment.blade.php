@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2" style="font-size: 15pt">Enlistments</h1>

      <div class="row px-2 py-0" hidden>

        <div class="col-sm-6 px-0">

          <div class="h2" style="font-size: 10pt;"> 

            <a href="" style="color:#7A353C; ">
    
              <div class="border rounded mlqu-color ml-2" style="height:7px; width:7px;"></div>
    
              <i data-feather="bell" ></i>
    
            </a>
           
          </div>

        </div>

        <div class="col-sm-6 pl-0">

          <div class="h2" style="font-size: 10pt;"> 

            <a href="" style="color:#7A353C; ">
    
              <div class="border rounded mlqu-color ml-2" style="height:7px; width:7px;"></div>
    
              <i data-feather="bell" ></i>
    
            </a>
            
          </div>

        </div>

      </div>
     
    </div>

    <div class='t' clas={{$id}}></div>

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

    <nav>

      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        
        <a class="nav-link active font-weight-bold"  style="color:#7A353C; font-size:9pt;" id="nav-home-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Control</a>
        
        <a class="nav-link "  style="color:#7A353C; font-size:9pt;" id="nav-profile-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Students</a>
      
      </div>

    </nav>

    <div class="tab-content" id="nav-tabContent">
      
      <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="nav-home-tab">
        
        <div class="container-fluid">
          
          {{-- <div class="row mt-2">
            
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
           --}}
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
    
    </div>

    @include('inc\modal\modals') 

  </main>


@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\registrar\enlistment') 

@endsection

