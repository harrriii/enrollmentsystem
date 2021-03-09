@extends('layouts.layout_dashboard')

@section('content')


  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2" style="font-size: 15pt">Class</h1>

    </div>

    <div class='t' clas={{$id}}></div>

    <div class="container-fluid" >

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
    
      <div class="col-sm-12">
    
        <div class="table-responsive-lg" style="white-space:nowrap;">
    
          <table class="table table-striped">
    
            <thead>
    
              <tr>
    
                {{-- <th class="text-center"  width="10%">Class No</th> --}}

                <th class="text-center" style="font-size: 9pt !important;" >Section</th>

                <th class="text-center" style="font-size: 9pt !important;" >Professor</th>

                <th class="text-center" style="font-size: 9pt !important;" >Created By</th>

                <th class="text-center" style="font-size: 9pt !important;" >Created Date</th>

                <th class="text-center" style="font-size: 9pt !important;" >Room</th>
             
                <th class="text-center" style="font-size: 9pt !important;" >Year</th>
             
                <th class="text-center" style="font-size: 9pt !important;" >S.Y/ Term</th>
             
                <th class="text-center" style="font-size: 9pt !important;" >Max Student</th>
             
                <th class="text-center" style="font-size: 9pt !important;" ></th>
             
              </tr>
          
            </thead>
          
            <tbody>
    
              @foreach ($classes as $class)
      
              <tr>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->section}}</td>
      
                <td style="font-size: 8pt !important;" class="">{{$class->professor}}</td>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->created}}</td>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->date}}</td>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->room}}</td>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->yr_name}}</td>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->school_year.' '.$class->term}}</td>
      
                <td style="font-size: 8pt !important;" class="text-center">{{$class->maxstudent}}</td>
      
                <td class="text-center">
      
                  <a class="a_icon cls_show" id="show" classNo={{$class->no}}><i data-feather="calendar" class="icon"></i></a>
      
                  <a class="a_icon cls_edit" classNo={{$class->no}} professor={{$class->professorNo}} section={{$class->section}} room={{$class->room}} schoolYear={{$class->schoolYearNo}} term={{$class->termNo}} year={{$class->yearNo}} maxStudent={{$class->maxstudent}} ><i data-feather="edit" class="icon"></i></a>
      
                  <a class="a_icon cls_delete" classNo={{$class->no}}><i data-feather="trash-2" class="icon"></i></a>
      
                </td>
      
              </tr>
  
              @endforeach
  
            </tbody>
  
          </table>
  
        </div>
  
      </div>
      
    </div>
    
    <div class="row pt-2">
 
      <div class="col-sm-10"></div>
 
      <div class="col-sm-2 text-right">
 
        <button type="button" class="btn text-light pb-3 pt-0" id="registrar_btnAdd" style="font-size:9pt;background:#7A353C;height:20px;width:80px">
 
          Add
 
        </button>

   
      </div>
   
    </div>
   
    @include('inc\modal\modals') 
  
  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\registrar\class') 

  @endsection

  