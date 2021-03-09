@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2" style="font-size: 15pt">Class Schedule</h1>

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

    <div class="container-fluid">
    
      <div class="row">
    
        <div class="col-sm-12 p-0">

            @if (count($data)>0)
     
            <div class="table-responsive-lg" style="white-space:nowrap;">
     
              <table class="table table-striped">
     
                <thead>
     
                  <tr>
     
                    <th style="font-size: 9pt !important;" class="text-center">Class No</th>
     
                    <th style="font-size: 9pt !important;" class="text-center">Subject Code</th>
     
                    <th style="font-size: 9pt !important;">Professor</th>
     
                    <th style="font-size: 9pt !important;"> Subject</th>
     
                    <th style="font-size: 9pt !important;" class="text-center">Time</th>
     
                    <th style="font-size: 9pt !important;" class="text-center">Day</th>
     
                    <th style="font-size: 9pt !important;" class="text-center"</th>
     
                  </tr>
     
                </thead>
     
                <tbody>
     
                  @foreach ($data as $schedule)
     
                    <tr>
      
                      <td style="font-size: 8pt !important;" class="text-center">{{$schedule->no}}</td>
      
                      <td style="font-size: 8pt !important;" class="text-center">{{$schedule->subjectCode}}</td>
      
                      <td style="font-size: 8pt !important;" class="px-5" >{{$schedule->professor}}</td>
      
                      <td style="font-size: 8pt !important;" >{{$schedule->subject}}</td>
      
                      <td style="font-size: 8pt !important;" class="text-center">{{$schedule->time}}</td>
      
                      <td style="font-size: 8pt !important;" class="text-center">{{$schedule->day}}</td>
      
                      <td class="text-center">
      
                        <a class="a_icon sch_edit" subjectCode={{$schedule->subjectCode}} professor={{$schedule->professorNo}} day={{$schedule->day}} timein={{$schedule->timein}} timeout={{$schedule->timeout}} scheduleNo={{$schedule->scheduleNo}} classNo={{$primaryKey}} ><i data-feather="edit" class="icon"></i></a>
      
                        <a class="a_icon sch_delete" scheduleNo={{$schedule->scheduleNo}}><i data-feather="trash-2" class="icon"></i></a>
      
                      </td>
      
                    </tr>
     
                  @endforeach
     
                </tbody>

                </table>

              </div>

          @else
                
            <div class="row">
            
              <div class="col">
            
                <div class="alert alert-secondary" role="alert">
            
                  No class schedule available.
            
                </div>
            
              </div>
       
            </div>
       
          @endif
    
        </div>
   
      </div>
   
      <div class="row">
   
        <div class="col-sm-10"></div>
   
        <div class="col-sm-2 text-right px-0">
   
          <button type="button" class="btn text-light pb-3 pt-0 mx-0" id="btn_add" classNo={{$primaryKey}} data-toggle="modal" data-dismiss="modal" style="font-size:9pt;background:#7A353C;height:20px;width:80px">Add</button>
   
        </div>
   
      </div>
   
    </div>

    @include('inc\modal\modals') 

  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\registrar\schedule') 

  @endsection
