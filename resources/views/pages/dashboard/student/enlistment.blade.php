@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <h1 class="h2">Enlistments</h1>

    </div>

    <div class="container-fluid">

      <div class="row p-2">

        <div class="col-lg-9 col-sm-2"></div>
  
        <div class="col-lg-3">

          <div class="row">

            <div class="col-sm-5 p-0 pt-1 text-left ">

              <label class="form-label">Batch No</label>

            </div>

            <div class="col-sm-7 p-0 text-left">

              <select class="form-control" id="sid" >

                @foreach ($filter as $fl)
    
                <option value={{$fl->enlismentbatch}}>{{$fl->enlismentbatch}}</option>
    
                @endforeach
    
              </select>

            </div>


          </div>
  
          

          
          
        </div>

      </div>

      <div class="row p-2">
        
        <div class="col p-0">
          
          <div class="table-responsive">
 
            <table class="table table-striped table-sm ">
       
              <thead>
       
                <tr>
       
                  <th class="px-5" width="50%">Subject</th>
       
                  <th class="text-center" width="20%">Date</th>
       
                  <th class="text-center" width="10%">Units</th>
       
                  <th class="text-center" width="10%">Status</th>
       
                </tr>
       
              </thead>
       
              <tbody>
       
                @foreach ($enlistment as $enl)
                
                <tr>
          
                  <td class="pl-5">{{$enl->subject}}</td>
          
                  <td class="text-center">{{$enl->date}}</td>
          
                  <td class="text-center">{{$enl->units}}</td>
          
                  @if ( $enl->status == 'FOR APPROVAL' )
          
                  <td class="text-center font-weight-bold" style="color:#AC1321 !important;">{{$enl->status}}</td>
          
                  @endif
          
                  @if ( $enl->status == 'Approved' )
          
                  <td class="text-center font-weight-bold" style="color:green !important;">{{$enl->status}}</td>
          
                  @endif
          
                  @if ( $enl->status == 'Declined' )
          
                  <td class="text-center font-weight-bold" style="color:red !important;">{{$enl->status}}</td>
          
                  @endif
          
                </tr>
          
                @endforeach
         
              </tbody>
       
            </table>
       
          </div>

        </div>
        

      </div>
 
    </div>
    
    
  
  </main>

  @endsection

  @section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\dashboard\student\enlistment') 

  @endsection