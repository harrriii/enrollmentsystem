@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Enlistments</h1>
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

    <div class="container">
      <div class="row">
        <div class="col-sm-9">
  
        </div>
        <div class="col-sm-3">
          <div class="form-group row row-cols-2">
            <label class="col-sm-3 col-form-label text-right" for="">Subject</label>
            <select  class="form-control col-sm-9" id="sid" >
              @foreach ($filter as $fl)
                <option value={{$fl->code}}>{{$fl->subject}}</option>
              @endforeach
            </select>
          </div>
          
        </div>
      </div>
    </div>
    
    
    <div class="table-responsive">
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
      @include('inc\modal\modals') 
    </div>
  </main>


  @endsection

  

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\adviser\enlistments') 

@endsection


 