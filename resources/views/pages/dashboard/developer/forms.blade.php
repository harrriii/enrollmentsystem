@extends('layouts.layout_dashboard')

@section('content')


  <main role="main" class="col-md-9 col-lg-10  " style="background:#FBF2F3 !important; ">

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

          <div class="container box-1 mt-4 bg-white" style="border-radius:10px;box-shadow: 0px 3px 13px -7px rgb(104, 104, 104);">

            <div class="row">

              <div class="col-lg-7 pt-3 pl-4 pb-0 mb-0 px-2 font-weight-bold" style="font-size:12pt;">

                Forms
            
              </div>

              <div class="col-lg-5 pt-3 pl-4 pr-4 pb-0 text-right " style="font-size:12pt;">

                <button type="button" class="btn btn-sm p-1" id="btn_add" data-toggle="tooltip" data-placement="bottom" title="Add" style=" font-size:9pt; height:25px; width:25px; border-radius:20px;color:#7A353C; box-shadow: 1px 1px 11px -7px rgb(104, 104, 104);"><i class="fas fa-plus"></i></button>
              
                <button type="button" class="btn btn-sm p-1" data-toggle="tooltip" data-placement="bottom" title="Export" style=" font-size:9pt; height:25px; width:25px; border-radius:20px;color:#7A353C; box-shadow: 1px 1px 11px -7px rgb(104, 104, 104);"><i class="fas fa-download"></i></button>
              
                <button type="button" class="btn btn-sm p-1 " data-toggle="tooltip" data-placement="bottom" title="Filter" style=" font-size:9pt; height:25px; width:25px; border-radius:20px;color:#7A353C; box-shadow: 1px 1px 11px -7px rgb(104, 104, 104);"><i class="fas fa-filter"></i></button>
            
              </div>

            </div>
            <div class="row mt-2">
                
              <div class="col-lg-12 p-0">

                <div class="table-responsive overflow-auto" style="max-height:400px; ">
    
                  <table class="table " style="max-height:300px;">
            
                    <thead class="thead-light">
            
                      <tr >

                        <th class="text-center  py-5 text-muted" style=" font-size:9pt;" width="5%">

                          <div class="custom-control custom-checkbox ml-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1"> </label>
                          </div>

                        </th>
      
                        <th class="text-center py-5 " style=" color:#344050; font-size:9pt;">Name</th>
        
                        <th class="text-center py-5 " style=" color:#344050; font-size:9pt;" width="10%"></th>
        
                      </tr>
          
                    </thead>
              
                    <tbody class="p-2" style="">
      
                      @foreach ( $forms as $form )
             
                        <tr >

                          <td class="text-center">
                           
                            <div class="custom-control custom-checkbox ml-3">
                           
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                          
                              <label class="custom-control-label" for="customCheck1"> </label>
                          
                            </div>
                            
                          </td>
              
                          <td class="text-center">{{ $form->formName }}</td>
                            
                          <td class="text-center">

                            <a class="a_icon show" fmi="{{$form->id}}"> <i data-feather="eye" class=" icon"></i></a>
                            
                            <a class="a_icon edit" formName="{{ $form->formName }}"  fmi="{{$form->id}}"> <i data-feather="edit" class=" icon"></i></a>
                              
                            <a class="a_icon delete" fmi="{{$form->id}}" ><i data-feather="trash-2" class=" icon"></i></a>
                            
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

  {{-- @include('inc\js\experimentals')  --}}

  @include('inc\js\dashboard\developer\forms') 

@endsection


 