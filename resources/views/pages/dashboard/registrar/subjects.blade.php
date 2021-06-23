@extends('layouts.layout_dashboard')

@section('content')


  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2" style="font-size: 15pt">Subjects to Offer</h1>

    </div>

    <div class='t' clas={{$id}} clas1={{$data}}></div>

    @php
        $count=0
    @endphp

    <div class="container">

      @if ($errors->any())
 
        <div class="row">
  
          <div class="col">
  
            <div class="alert alert-danger">
  
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

          <div class="col border border-light p-0">

            <div class="table-responsive">

              <table class="table table-striped table-sm">

                <thead>

                  <tr>

                    <th class="text-center" style="font-size: 9pt !important;" width="20%">Course Code</th>

                    <th class="text-center" style="font-size: 9pt !important;" width="25%">Subject</th>

                    <th class="text-center" style="font-size: 9pt !important;" width="15%">Year</th>

                    <th class="text-center" style="font-size: 9pt !important;" width="15%">Min. Year</th>

                    <th class="text-center" style="font-size: 9pt !important;" width="15%">Max. Year</th>

                    <th class="text-center" style="font-size: 9pt !important;" width="10%"></th>
    
                  </tr>
    
                </thead>
      
                <tbody>

    
                  @foreach ($subjects as $subject)

                    <tr>

                      {{-- <td class="text-center">

                        <div>

                          <input type="checkbox" class="custom-checkbox" code={{$subject->subjectCode}} >

                          <label class="custom-checkbox" ></label>

                        </div>

                      </td> --}}

                      <td class="text-center" style="font-size: 8pt !important;">{{$subject->subjectCode}}</td>

                      <td class="" style="font-size: 8pt !important;">{{$subject->subject}}</td>

                      <td class="text-center" style="font-size: 8pt !important;">

                        @if ($subject->forYr == 1)
            
                          Freshman
            
                        @endif
        
                        @if ($subject->forYr == 2)
          
                          Sophomore   
          
                        @endif
          
                        @if ($subject->forYr == 3)
          
                          Junior
          
                        @endif
          
                        @if ($subject->forYr == 4)
          
                          Senior    
          
                        @endif
          
                      </td>

                      <td class="text-center" style="font-size: 8pt !important;">
        
                        @if ($subject->minYr == 1)
        
                          Freshman
        
                        @endif
        
                        @if ($subject->minYr == 2)
        
                          Sophomore   
        
                        @endif
        
                        @if ($subject->minYr == 3)
        
                          Junior
        
                        @endif
        
                        @if ($subject->minYr == 4)
      
                          Senior    
        
                        @endif
        
                      </td>
        
                      <td class="text-center" style="font-size: 8pt !important;">
      
                        @if ($subject->maxYr == 1)
      
                        Freshman
      
                        @endif
      
                        @if ($subject->maxYr == 2)
      
                          Sophomore   
      
                        @endif
      
                        @if ($subject->maxYr == 3)
                        
                          Junior
      
                        @endif
      
                        @if ($subject->maxYr == 4)
      
                          Senior    
      
                        @endif
      
                      </td>
          
                      <td class="text-center">
          
                        <a class="a_icon sub_edit" code="{{$subject->no}}" subject_code="{{$subject->subjectCode}}" forYr="{{$subject->forYr}}" minYr="{{$subject->minYr}}" maxYr="{{$subject->maxYr}}" subject="{{$subject->subject}}"><i data-feather="edit" class=" icon"></i></a>
          
                        <a class="a_icon sub_delete"  code="{{$subject->no}}"  ><i data-feather="trash-2" class=" icon"></i></a>
      
                      </td>
          
                    </tr>
         
                  @endforeach
                
              </tbody>
  
            </table>
  
          </div>
  
        </div>
  
      </div>
      
      <div class="row ">
  
        <div class="col-8"></div>
  
        <div class="col-4 text-right p-0">
  
          <button type="button" class="btn text-light pb-1 pt-0"  id="subjects_btn_add" style="font-size:9pt;background:#7A353C;height:20px;width:80px">Add</button>
  
        </div>
  
      </div>

      @include('inc\modal\modals') 
  
    </div>
  
  </main>

@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\registrar\subjects') 

@endsection


 