@extends('layouts.layout_home')

@section('content')

  <main class="container-fluid">

    <div class="row">
      
      <div class="col test"></div>

    </div>

    <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      
      <h1 class="display-4" style="font-size:32pt;">Verify your Application</h1>

    </div>

 

    <div class="container w-50" >


      @if(session()->has('success-message'))
    
        <div class="row">
      
          <div class="col p-0">
      
            <div class="alert alert-success">
      
              {{ session()->get('success-message') }}
      
            </div>
      
          </div>
      
        </div>
    
      @endif

      @if(session()->has('fail-message'))
      
        <div class="row">
        
          <div class="col p-0">
        
            <div class="alert alert-danger">
        
              {{ session()->get('fail-message') }}
        
            </div>
        
          </div>
        
        </div>
    
      @endif
    
  

      <div class="row ">

        <div class="col-lg-12 border rounded p-4">

          <form action="/APPLICATION/VERIFY" method="POST">
            @csrf

            <label style="font-size:9pt;" class="text-muted mt-2">Applicant Id</label>
                        
            <input readonly name="applicantId" class="form-control form-control-sm" type="text" id="applicant_id">


            <label style="font-size:9pt;" class="text-muted mt-2">Enter One Time Password</label>
                        
            <input name="verificationCode" class="form-control form-control-sm" type="text" id="applicant_txtNationality">

            <div class="text-center mt-4">

              <button type="submit" class="btn btn-sm mlqu-color text-light" style="background:#7A353C;height:25px;width:40%" data-dismiss="modal" id="btn_modal_submit">Confirm</button>

            </div>


          </form>
    
        </div>
      
      </div>

    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-12 col-md">
          <img class="mb-2" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
          <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Cool stuff</a></li>
            <li><a class="link-secondary" href="#">Random feature</a></li>
            <li><a class="link-secondary" href="#">Team feature</a></li>
            <li><a class="link-secondary" href="#">Stuff for students</a></li>
            <li><a class="link-secondary" href="#">Another one</a></li>
            <li><a class="link-secondary" href="#">Last time</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Resource</a></li>
            <li><a class="link-secondary" href="#">Resource name</a></li>
            <li><a class="link-secondary" href="#">Another resource</a></li>
            <li><a class="link-secondary" href="#">Final resource</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">School</a></li>
            <li><a class="link-secondary" href="#">Questions</a></li>
            <li><a class="link-secondary" href="#">Questions</a></li>
            <li><a class="link-secondary" href="#">Questions</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </main>

@include('inc\modal\modals') 
@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\experimentals') 

  @include('inc\js\home\emailverification') 

@endsection
