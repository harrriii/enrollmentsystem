@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-8 col-lg-10  " style="background:#061325!important; ">

    <div class='t' clas={{$id}}></div>

    
    @php

      $count=0

    @endphp

    <div class="container customScroll " style="max-height:100% !important; overflow-x:hidden !important; overflow-y:auto !important;">

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
      
      <div class="row mt-4 mb-0">
      
        <div class="col">
      
          <div class="alert alert-close alert-success">
      
            {{ session()->get('success-message') }}
      
          </div>
      
        </div>
      
      </div>
      
      @endif

      @if(session()->has('fail-message'))

      <div class="row mt-4 mb-0">

        <div class="col">

          <div class="alert alert-close alert-danger">

            {{ session()->get('fail-message') }}

          </div>

        </div>

      </div>

      @endif

      <div class="row ">

        <div class="col-lg">

          <div class="container mt-4" style=" background: #061325 !important;">

            <div class="row my-0"  >

              <div class="col-lg-7 pl-0 text-white font-weight-bold" style=" color:white; font-size: 16px;  ">

               Visitor Logs
            
              </div>

              <div class="col-lg-5 text-right p-0 m-0 pt-4 mb-1 text-white font-weight-bold" style="font-size:10pt;">
                  
                 Saturday, 19 June 2021

              </div>

             

            </div>

            <div class="row shadow-sm py-lg-2 px-0" style="border-radius:6px; background:#0E1C2F!important;">
                
              <div class="col-lg-7" style="font-family: 'Roboto Condensed'!important; color:white; font-weight:light; font-size: 16px;  ">

                Visitor List

              </div>
              
              <div class="col-lg-5 text-right " style="font-size:12pt;">

                <button type="button" class="btn btn-sm pl-0 text-white " id="btn_add" data-toggle="tooltip" data-placement="bottom" title="Add" style=" font-size:9pt; background:#061325!important; font-weight:500; height:29px; width:85px; box-shadow: -1px 8px 51px -3px rgba(0,0,0,0.71);"><i class="bi bi-funnel px-1" style="font-size: 11pt;"></i> Filter</button>
                
                <button type="button" class="btn btn-sm pl-0 text-white " id="btn_add" data-toggle="tooltip" data-placement="bottom" title="Add" style=" font-size:9pt; background:#061325!important; font-weight:500; height:29px; width:105px; box-shadow: -1px 8px 51px -3px rgba(0,0,0,0.71);"><i class="bi bi-download px-1" style="font-size: 11pt;"></i> Download</button>

              </div>

            </div>

            <div class="row mt-2">
                
              <div class="col-lg-12 p-0">

                <div class="table-responsive overflow-auto" style="max-height:400px; background: #061325 !important; border-radius:7px  ;">
    
                  <table class="table table-dark" style="max-height:300px;">
            
                    <thead class="" >
            
                      <tr>

                        <th class="text-center  py-5 text-muted" style=" font-size:9pt;" width="5%">

                          <div class="custom-control custom-checkbox ml-3">
                            
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                           
                            <label class="custom-control-label" for="customCheck1"> </label>

                          </div>

                        </th>

                        <th class="text-center py-5 " style=" font-size:9pt;">Name</th>

                        <th class="text-center py-5 " style=" font-size:9pt;">Purpose</th>

                        <th class="text-center py-5 " style=" font-size:9pt;">Time In</th>

                        <th class="text-center py-5 " style=" font-size:9pt;">Time Out</th>
  
                        <th class="text-center py-5 " style=" font-size:9pt;" width="10%"></th>
        
                      </tr>
          
                    </thead>
              
                    <tbody class="p-2" style="background: #061325 !important;">
      
                      @foreach ( $contents as $c )
            
                        <tr >

                          <td class="text-center">
                          
                            <div class="custom-control custom-checkbox ml-3">
                          
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                          
                              <label class="custom-control-label" for="customCheck1"></label>
                          
                            </div>
                            
                          </td>

                          <td class="text-center">{{ $c->name }}</td>
              
                          <td class="text-center">{{ $c->purpose }}</td>

                          <td class="text-center">{{ $c->time_in }}</td>

                          <td class="text-center">{{ $c->time_out }}</td>
          
                          <td class="text-center">
                            
                            <a class="a-lazy-color-gray show" > <i data-feather="eye" class=" icon"></i></a>
                            
                            <a class="a-lazy-color-gray edit" > <i data-feather="edit" class=" icon"></i></a>
                              
                            <a class="a-lazy-color-gray delete" itemId = '{{ $c->id}}'><i data-feather="trash-2" class=" icon"></i></a>

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

    </div> 

    
    @include('inc\modal\modals')

  </main>


@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\developer\visitors') 

@endsection
 