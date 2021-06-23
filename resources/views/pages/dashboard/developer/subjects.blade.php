@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="background-color: #061325 !important;">

    {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2"  style="font-size: 15pt">Subjects</h1>

    </div>

    <div class='t' clas={{$id}}></div>

    @php

      $count=0

    @endphp

    <div class="container">

      @if ($errors->any())
     
      <div class="row">
     
        <div class="col">
     
          <div class="alert alert-close alert-close alert-danger">
     
            <ul>
     
              @foreach ($errors->all() as $error)
     
              <li>{{ $error }}</li>
     
              @endforeach
     
            </ul>
     
          </div>
     
        </div>
     
      </div>
     
      @endif


      
      @if(session()->has('success-message'))
      
      <div class="row">
      
        <div class="col">
      
          <div class="alert alert-close alert-success">
      
            {{ session()->get('success-message') }}
      
          </div>
      
        </div>
      
      </div>
      
      @endif

      @if(session()->has('fail-message'))
  
      <div class="row">
  
        <div class="col">
  
          <div class="alert alert-close alert-danger">
  
            {{ session()->get('fail-message') }}
  
          </div>
  
        </div>
  
      </div>
  
      @endif
      
      <div class="row">
      
        <div class="col border border-light">
      
          <div class="table-responsive">
      
            <table class="table table-striped table-sm ">
      
              <thead>
      
                <tr>
 
                  <th class="text-center" width="10%">Subject Code</th>

                  <th class="text-center" width="18%">School</th>
 
                  <th class="text-center" width="20%">Prerequisite</th>
 
                  <th class="text-center" width="20%">Subject</th>
 
                  <th class="text-center" width="15%">Category</th>
 
                  <th class="text-center" width="5%">Lec</th>

                  <th class="text-center" width="5%">Lab</th>
 
                  <th class="text-center" width="7%"></th>
 
                </tr>
    
              </thead>
       
              <tbody>

                @foreach ($subjects as $subject)
          
                  <tr>

                    <td class="text-center">{{$subject->subject_code}}</td>

                    <td class="text-center">{{$subject->program}}</td>

                    <td class="">{{$subject->prerequisite}}</td>

                    <td class="">{{$subject->name}}</td>
        
                    <td class="text-center">{{$subject->category}}</td>
                      
                    <td class="text-center">{{$subject->lecture}}</td>

                    <td class="text-center">{{$subject->laboratory}}</td>
                      
                    <td class="text-center">
        
                      <a class="a_icon edit" col_0="{{$subject->subject_code}}"  col_2="{{$subject->category}}" col_1="{{$subject->name}}" col_3="{{$subject->prerequisite}}"> <i data-feather="edit" class=" icon"></i></a>
                        
                      <a class="a_icon delete" col_0="{{$subject->subject_code}}" ><i data-feather="trash-2" class=" icon"></i></a>
                      
                    </td>
                  
                  </tr>

                @endforeach
                
              </tbody>
     
            </table>
     
          </div>
     
        </div>
     
      </div>
      
      <div class="row">
 
        <div class="col-8"></div>
   
        <div class="col-4 text-right">
 
          <button type="button" class="btn text-light pb-1 pt-0"  id="btn_add" style="font-size:9pt;background:#7A353C;height:20px;width:80px">Add</button>
          <button type="button" class="btn text-light pb-1 pt-0"  id="btn_test" style="font-size:9pt;background:#7A353C;height:20px;width:80px">Test</button>
 
        </div>
 
      </div>
      
    </div>  --}}

    @include('inc\modal\modals')
 
  </main>

@endsection

@section('script')

  @include('inc\js\reuseable') 

  {{-- @include('inc\js\experimentals')  --}}

  @include('inc\js\dashboard\developer\experimentals') 

@endsection


 