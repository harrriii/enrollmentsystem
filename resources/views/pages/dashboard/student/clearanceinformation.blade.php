@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container-fluid mt-1 px-0 py-1">

      <div class="row">

        <div class="col-sm-12">

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">

            <h1 class="h2" style="font-size: 15pt">Clearance</h1>
      
          </div>
        
        </div>
      
      </div>

      <div class="row">

        <div class="col-sm-12 py-1 pt-0" style="font-size:10pt;">

          <nav aria-label="breadcrumb" >
          
            <ol class="breadcrumb py-1" style="background:#F9EFEF">
          
              <li class="breadcrumb-item">
                
                <a href="/dashboard" class="text-secondary">Clearance Sheet</a>
            
              </li>
          
              <li class="breadcrumb-item">
            
                <a href="/dashboard/student/clearance/information" class="item-active font-weight-bold" >Clearance Information</a>
            
              </li>
          
            </ol>
        
          </nav>

        </div>

      </div>

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

      <div class="row">
    
        <div class="col-sm-12 p-0">
          
          @php

              $count=1;
              
          @endphp


          {{-- {{ $sheetNo }} --}}

          @if ($sheetNo != 0)
          
            @if (count($data)==0)

              <div class="alert alert-secondary">

                <label class="text-muted" style="font-size:9pt;">Your clearance sheet is now visible. Please check this page regularly.</label>
      
              </div>
                
            @else

              <div class="table-responsive-lg " style="white-space:nowrap;">

                <table class="table table-striped">
          
                  <thead>
          
                      <tr>
          
                      <th class="text-center py-1" style="font-size: 9pt !important;" >No</th>
                      
                      <th class="text-center py-1" style="font-size: 9pt !important;" >Department</th>

                      <th class="text-center py-1" style="font-size: 9pt !important;" >Signed by</th>
                      
                      <th class="text-center py-1" style="font-size: 9pt !important;" >Status</th>
                      
                      <th class="text-center py-1" style="font-size: 9pt !important;" >Remarks</th>
                      
                      {{-- <th class="text-center py-1" style="font-size: 9pt !important;" ></th> --}}
                  
                      </tr>
                  
                  </thead>
              
                  <tbody>

                    @foreach ($data as $d)

                      <td style="font-size: 8pt !important;" class="text-center py-1">{{$count++}}</td>

                      <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->departmentname}}</td>

                      <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->name}}</td>

                      <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->status}}</td>

                      <td style="font-size: 8pt !important;" class="text-center py-1">{{$d->remarks}}</td>

                      {{-- <td class="text-center py-1">
              
                          <a style="color:#7A353C;" code={{$d->id}} name="{{$d->name}}" class="a_icon __edit"><i data-feather="edit" class="icon"></i></a>
              
                          <a style="color:#7A353C;" code={{$d->id}}  class="a_icon __delete"><i data-feather="trash-2" class="icon"></i></a>
              
                      </td>
                          --}}
                    @endforeach

                  </tbody>

                </table>
        
              </div>
           
            @endif
                      
          @else

            <div class="alert alert-secondary">

              <label class="text-muted" style="font-size:9pt;">Please update your clearance sheet.</label>

    
            </div>

          @endif
                
    
        </div>
        
      </div>
   
    </div>
   
    @include('inc\modal\modals') 
  
  </main>

  @endsection
  
  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\staff\clearance') 

  @endsection

  